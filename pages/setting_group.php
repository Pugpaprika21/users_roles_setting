<?php include_once __DIR__ . "../../configs/includes.php"; ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Groups</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container my-5">
        <h1 class="mb-4">Select User Groups</h1>
        <div class="form-group-setting">
            <form action="../proceed/save_group.php" method="POST" id="handler-group-submit">
                <input type="hidden" name="user_id" value="<?php echo $userId; ?>">
                <?php

                $userId = $_GET["user_id"] ?? 0;
                $userGroup = $db->selectRow("SELECT COUNT(1) AS has_group FROM users_group_setting WHERE user_id = ?", [$userId]);

                if ($userGroup["has_group"] > 0) {
                    $groupRows = $db->selectAll("
                        SELECT DISTINCT ug.id, ug.group_name, CASE WHEN ugs.user_id IS NOT NULL THEN TRUE ELSE FALSE END AS has_in_group
                        FROM users_group AS ug
                        LEFT JOIN (SELECT group_id, user_id FROM users_group_setting WHERE user_id = ?) AS ugs ON ug.id = ugs.group_id
                        ORDER BY ug.created_at DESC
                    ", [$userId]);
                } else {
                    $groupRows = $db->selectAll("SELECT id, group_name FROM users_group ORDER BY created_at DESC");
                }

                $db->close();

                ?>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="" id="select_all">
                    <label class="form-check-label" for="select_all">
                        <span id="checked-all-text">เลือก</span>
                    </label>
                </div>

                <?php foreach ($groupRows as $group) { ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?php echo $group["id"]; ?>" id="group_<?php echo $group["id"]; ?>" name="user_groups[]" <?php echo !empty($group["has_in_group"]) ? "checked" : ""; ?>>
                        <label class="form-check-label" for="group_<?php echo $group["id"]; ?>">
                            <?php echo $group["group_name"]; ?>
                        </label>
                    </div>
                <?php } ?>

                <button type="submit" class="btn btn-primary btn-sm mt-3" id="btn-set-group">
                    <div class="spinner-border spinner-border-sm spinner-check" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div> <span id="btn-submit-text">บันทึก</span> 
                </button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <SCript src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
        $(document).ready(function() {
            let checkedVals = [];
            let uncheckedVals = [];
            let checkedAllAlert = "";

            $(".spinner-check").hide();

            function handlerSetGroupChecked() {
                let isChecked = $(this).prop("checked");
                let checkVal = $(this).val();

                if (isChecked) {
                    checkedVals.push(checkVal);
                    let index = uncheckedVals.indexOf(checkVal);
                    if (index !== -1) {
                        uncheckedVals.splice(index, 1);
                    }
                    $("#btn-set-group").attr("disabled", false);
                } else {
                    let index = checkedVals.indexOf(checkVal);
                    if (index !== -1) {
                        checkedVals.splice(index, 1);
                    }

                    if (uncheckedVals.indexOf(checkVal) === -1) {
                        uncheckedVals.push(checkVal);
                    }
                }
            }

            $("input[name='user_groups[]']").each(function() {
                handlerSetGroupChecked.call(this);
            });

            $("input[name='user_groups[]']").change(function() {
                handlerSetGroupChecked.call(this);
            });

            $("#select_all").change(function() {
                let isChecked = $(this).prop("checked");
                if (isChecked) {
                    checkedAllAlert = "N";
                    $("#checked-all-text").text("เลือกทั้งหมด");
                    $("#btn-submit-text").text("บันทึกสิทธิ์");
                    $("#btn-set-group").removeClass().addClass("btn btn-primary btn-sm mt-3");
                } else {
                    checkedAllAlert = "Y";
                    $("#checked-all-text").text("ลบทั้งหมด");
                    $("#btn-submit-text").text("ลบสิทธิ์ทั้งหมด");
                    $("#btn-set-group").removeClass().addClass("btn btn-danger btn-sm mt-3");
                }

                $("input[name='user_groups[]']").prop("checked", isChecked).each(function() {
                    handlerSetGroupChecked.call(this);
                });
                $("#btn-set-group").attr("disabled", false);
            });

            $("#handler-group-submit").submit(function(e) {
                e.preventDefault();

                if (checkedVals.length == 0) {
                    alert("pleace select user group");
                    $("#btn-set-group").attr("disabled", true);
                    return;
                }

                if (checkedAllAlert == "Y") {
                    alert("ต้องการลบ user groups หรือไม่");
                }

                $(".spinner-check").show();
                $("#btn-set-group").attr("disabled", false);

                setTimeout(() => {
                    $.ajax({
                        type: "POST",
                        url: "../proceed/save_group.php",
                        data: {
                            action: "set_groups",
                            user_id: "<?php echo $userId; ?>",
                            user_groups: {
                                in_group: checkedVals,
                                not_in_group: uncheckedVals,
                                has_group: "<?php echo ($userGroup['has_group'] > 0) ? $userGroup['has_group'] : 0; ?>"
                            },
                        },
                        dataType: "json",
                        success: function(resp) {
                            if (resp.status_bool) {
                                window.location.href = resp.self_url;
                            } else {
                                $("#btn-set-group").prop("disabled", false);
                                $(".spinner-check").hide();
                            }
                        },
                        error: function() {
                            $("#btn-set-group").prop("disabled", false);
                            $(".spinner-check").hide();
                        }
                    });
                }, 2000);
            });
        });
    </script>
</body>

</html>