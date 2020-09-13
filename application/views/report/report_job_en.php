<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ใบรับรองแพทย์สมัครงาน</title>
</head>

<body>
    <?php
    date_default_timezone_set('Asia/Bangkok');
    $day = date("m");
    $thai_month_arr = array(
        "00" => "",
        "01" => "มกราคม",
        "02" => "กุมภาพันธ์",
        "03" => "มีนาคม",
        "04" => "เมษายน",
        "05" => "พฤษภาคม",
        "06" => "มิถุนายน",
        "07" => "กรกฎาคม",
        "08" => "สิงหาคม",
        "09" => "กันยายน",
        "10" => "ตุลาคม",
        "11" => "พฤศจิกายน",
        "12" => "ธันวาคม"
    );
    $d = date("d");
    $m = $thai_month_arr[date("m")];
    $y = date("Y") + 543;
    ?>
    <!-- --------------------------------------------------------------------------------------------- -->
    <div>
        <div style="float: left; width: 50%; padding-top: -8px;">
            <?php echo nbs(20); ?><label><?php echo $day ?></label>
        </div>
        <div style="float: right; width: 50%; padding-top: -8px;">
            <?php echo nbs(60); ?><label><?php echo $count ?></label>
        </div>
    </div>
    <!-- --------------------------------------------------------------------------------------------- -->
    <?php if ($patients != "null") { ?>
        <div style="padding-left: 185px; padding-top: 53px;">
            <label><?php echo $patients->PATIEN_NAME ?></label>
        </div>
        <div style="padding-left: 40px; height: 44px;">
            <div>
                <?php echo nbs(35); ?><label><?php echo $patients->PATIEN_ADDRESS ?></label>
            </div>
        </div>
        <!-- --------------------------------------------------------------------------------------------- -->
        <?php
        $separate1 = substr($patients->IDCARD, 0, -12);
        $separate2 = substr($patients->IDCARD, 1, -11);
        $separate3 = substr($patients->IDCARD, 2, -10);
        $separate4 = substr($patients->IDCARD, 3, -9);
        $separate5 = substr($patients->IDCARD, 4, -8);
        $separate6 = substr($patients->IDCARD, 5, -7);
        $separate7 = substr($patients->IDCARD, 6, -6);
        $separate8 = substr($patients->IDCARD, 7, -5);
        $separate9 = substr($patients->IDCARD, 8, -4);
        $separate10 = substr($patients->IDCARD, 9, -3);
        $separate11 = substr($patients->IDCARD, 10, -2);
        $separate12 = substr($patients->IDCARD, 11, -1);
        $separate13 = substr($patients->IDCARD, 12, 1);
        ?>
        <div style="padding-left: 216px; padding-top: 17px;">
            <label><?php echo $separate1 ?></label><?php echo nbs(3); ?>
            <label><?php echo $separate2 ?></label><?php echo nbs(3); ?>
            <label><?php echo $separate3 ?></label><?php echo nbs(2); ?>
            <label><?php echo $separate4 ?></label><?php echo nbs(2); ?>
            <label><?php echo $separate5 ?></label><?php echo nbs(3); ?>
            <label><?php echo $separate6 ?></label><?php echo nbs(3); ?>
            <label><?php echo $separate7 ?></label><?php echo nbs(2); ?>
            <label><?php echo $separate8 ?></label><?php echo nbs(2); ?>
            <label><?php echo $separate9 ?></label><?php echo nbs(2); ?>
            <label><?php echo $separate10 ?></label><?php echo nbs(4); ?>
            <label><?php echo $separate11 ?></label><?php echo nbs(2); ?>
            <label><?php echo $separate12 ?></label><?php echo nbs(3); ?>
            <label><?php echo $separate13 ?></label>
        </div>
        <!-- --------------------------------------------------------------------------------------------- -->
        <?php foreach ($job as $jobs) { ?>
            <?php
            if ($jobs->Diseases == "ไม่มี") { ?>
                <div style="padding-left: 275px; padding-top: 34px;">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAADICAMAAACahl6sAAAAZlBMVEUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABwbJTWAAAAIXRSTlMAIjEyMzQ1Njk7PkJDRUZHUbW9vr/AwcfIycrOz9DR0tMaZRLDAAAB1klEQVRo3u3aCVLCQBBG4bhvuKBiiBqw739JC1ERmcAkoUj/Xe8dgJmvBoqkk6IgIiIiIiIiIiIiIiIiIiIiIiIaqqMgjjc7CeGYmtlxEEcEydJh8t+uH4e6ZOUwOwviMDsN4jA7D+JQlWw6zC6COMyu5BzPSYfNY5yHveDAgQMHDhw4cODAgQMHDhw4cODAgQMHDhw4cODAgQMHDhw4bHK4HVw+7eNTJmlHfTjHyGwa4TxuFuuV+r+P0XLFMoijp2R4x+1q1TKIo4dkeMfd+splEEdHyfCO+83VS0XHQ2r9ck+OA/4PXqd38Kh2XVIU7+k9lFrnsajqLfFy3d5X4uf+o5/E031UH4mv+8EGyVTN0V3i7/68m8TjnKGLxOe8pL1k5nTu01ZSu51ftZPUjudwbSS163livqR2PhfNldTu57t5Ev+OPImCI0ei4dgtUXHskug4tkuUHNskMxdzhvzm6f2Oxw7mPns5E7HzaClx/ry2CuLIlgg8P6+COLIkIu8zVEEcOyVC75dUQRxbJWLv+1RBHI0SOUeDRNCRlEg6EhJRx4ZE1vFPIuxYk0g7/kjEHb8Sece3JIDjSxLCURQfrwURERERERERERERERERERERdegTb+mXJwX1alEAAAAASUVORK5CYII=" width="25px" height="25px">
                </div>
            <?php } else { ?>
                <div style="padding-top: 34px;">
                    <div style="float: left; width: 60%;">
                        <?php echo nbs(69); ?> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAADICAMAAACahl6sAAAAZlBMVEUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABwbJTWAAAAIXRSTlMAIjEyMzQ1Njk7PkJDRUZHUbW9vr/AwcfIycrOz9DR0tMaZRLDAAAB1klEQVRo3u3aCVLCQBBG4bhvuKBiiBqw739JC1ERmcAkoUj/Xe8dgJmvBoqkk6IgIiIiIiIiIiIiIiIiIiIiIiIaqqMgjjc7CeGYmtlxEEcEydJh8t+uH4e6ZOUwOwviMDsN4jA7D+JQlWw6zC6COMyu5BzPSYfNY5yHveDAgQMHDhw4cODAgQMHDhw4cODAgQMHDhw4cODAgQMHDhw4bHK4HVw+7eNTJmlHfTjHyGwa4TxuFuuV+r+P0XLFMoijp2R4x+1q1TKIo4dkeMfd+splEEdHyfCO+83VS0XHQ2r9ck+OA/4PXqd38Kh2XVIU7+k9lFrnsajqLfFy3d5X4uf+o5/E031UH4mv+8EGyVTN0V3i7/68m8TjnKGLxOe8pL1k5nTu01ZSu51ftZPUjudwbSS163livqR2PhfNldTu57t5Ev+OPImCI0ei4dgtUXHskug4tkuUHNskMxdzhvzm6f2Oxw7mPns5E7HzaClx/ry2CuLIlgg8P6+COLIkIu8zVEEcOyVC75dUQRxbJWLv+1RBHI0SOUeDRNCRlEg6EhJRx4ZE1vFPIuxYk0g7/kjEHb8Sece3JIDjSxLCURQfrwURERERERERERERERERERERdegTb+mXJwX1alEAAAAASUVORK5CYII=" width="25px" height="25px">

                    </div>
                    <div style="float: right; width: 40%;">
                        <label><?php echo $jobs->DiseasesDetail ?></label>
                    </div>
                </div>
            <?php  } ?>
            <!-- --------------------------------------------------------------------------------------------- -->
            <?php
            if ($jobs->Accident == "ไม่มี") { ?>
                <div style="padding-left: 275px; padding-top: 1px;">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAADICAMAAACahl6sAAAAZlBMVEUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABwbJTWAAAAIXRSTlMAIjEyMzQ1Njk7PkJDRUZHUbW9vr/AwcfIycrOz9DR0tMaZRLDAAAB1klEQVRo3u3aCVLCQBBG4bhvuKBiiBqw739JC1ERmcAkoUj/Xe8dgJmvBoqkk6IgIiIiIiIiIiIiIiIiIiIiIiIaqqMgjjc7CeGYmtlxEEcEydJh8t+uH4e6ZOUwOwviMDsN4jA7D+JQlWw6zC6COMyu5BzPSYfNY5yHveDAgQMHDhw4cODAgQMHDhw4cODAgQMHDhw4cODAgQMHDhw4bHK4HVw+7eNTJmlHfTjHyGwa4TxuFuuV+r+P0XLFMoijp2R4x+1q1TKIo4dkeMfd+splEEdHyfCO+83VS0XHQ2r9ck+OA/4PXqd38Kh2XVIU7+k9lFrnsajqLfFy3d5X4uf+o5/E031UH4mv+8EGyVTN0V3i7/68m8TjnKGLxOe8pL1k5nTu01ZSu51ftZPUjudwbSS163livqR2PhfNldTu57t5Ev+OPImCI0ei4dgtUXHskug4tkuUHNskMxdzhvzm6f2Oxw7mPns5E7HzaClx/ry2CuLIlgg8P6+COLIkIu8zVEEcOyVC75dUQRxbJWLv+1RBHI0SOUeDRNCRlEg6EhJRx4ZE1vFPIuxYk0g7/kjEHb8Sece3JIDjSxLCURQfrwURERERERERERERERERERERdegTb+mXJwX1alEAAAAASUVORK5CYII=" width="25px" height="25px">
                </div>
            <?php } else { ?>
                <div>
                    <div style="float: left; width: 60%;">
                        <?php echo nbs(69); ?> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAADICAMAAACahl6sAAAAZlBMVEUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABwbJTWAAAAIXRSTlMAIjEyMzQ1Njk7PkJDRUZHUbW9vr/AwcfIycrOz9DR0tMaZRLDAAAB1klEQVRo3u3aCVLCQBBG4bhvuKBiiBqw739JC1ERmcAkoUj/Xe8dgJmvBoqkk6IgIiIiIiIiIiIiIiIiIiIiIiIaqqMgjjc7CeGYmtlxEEcEydJh8t+uH4e6ZOUwOwviMDsN4jA7D+JQlWw6zC6COMyu5BzPSYfNY5yHveDAgQMHDhw4cODAgQMHDhw4cODAgQMHDhw4cODAgQMHDhw4bHK4HVw+7eNTJmlHfTjHyGwa4TxuFuuV+r+P0XLFMoijp2R4x+1q1TKIo4dkeMfd+splEEdHyfCO+83VS0XHQ2r9ck+OA/4PXqd38Kh2XVIU7+k9lFrnsajqLfFy3d5X4uf+o5/E031UH4mv+8EGyVTN0V3i7/68m8TjnKGLxOe8pL1k5nTu01ZSu51ftZPUjudwbSS163livqR2PhfNldTu57t5Ev+OPImCI0ei4dgtUXHskug4tkuUHNskMxdzhvzm6f2Oxw7mPns5E7HzaClx/ry2CuLIlgg8P6+COLIkIu8zVEEcOyVC75dUQRxbJWLv+1RBHI0SOUeDRNCRlEg6EhJRx4ZE1vFPIuxYk0g7/kjEHb8Sece3JIDjSxLCURQfrwURERERERERERERERERERERdegTb+mXJwX1alEAAAAASUVORK5CYII=" width="25px" height="25px">

                    </div>
                    <div style="float: right; width: 40%;">
                        <label><?php echo $jobs->AccidentDetail ?></label>
                    </div>
                </div>
            <?php  } ?>
            <!-- --------------------------------------------------------------------------------------------- -->
            <?php
            if ($jobs->Hospital == "ไม่มี") { ?>
                <div style="padding-left: 275px; padding-top: 3px;">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAADICAMAAACahl6sAAAAZlBMVEUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABwbJTWAAAAIXRSTlMAIjEyMzQ1Njk7PkJDRUZHUbW9vr/AwcfIycrOz9DR0tMaZRLDAAAB1klEQVRo3u3aCVLCQBBG4bhvuKBiiBqw739JC1ERmcAkoUj/Xe8dgJmvBoqkk6IgIiIiIiIiIiIiIiIiIiIiIiIaqqMgjjc7CeGYmtlxEEcEydJh8t+uH4e6ZOUwOwviMDsN4jA7D+JQlWw6zC6COMyu5BzPSYfNY5yHveDAgQMHDhw4cODAgQMHDhw4cODAgQMHDhw4cODAgQMHDhw4bHK4HVw+7eNTJmlHfTjHyGwa4TxuFuuV+r+P0XLFMoijp2R4x+1q1TKIo4dkeMfd+splEEdHyfCO+83VS0XHQ2r9ck+OA/4PXqd38Kh2XVIU7+k9lFrnsajqLfFy3d5X4uf+o5/E031UH4mv+8EGyVTN0V3i7/68m8TjnKGLxOe8pL1k5nTu01ZSu51ftZPUjudwbSS163livqR2PhfNldTu57t5Ev+OPImCI0ei4dgtUXHskug4tkuUHNskMxdzhvzm6f2Oxw7mPns5E7HzaClx/ry2CuLIlgg8P6+COLIkIu8zVEEcOyVC75dUQRxbJWLv+1RBHI0SOUeDRNCRlEg6EhJRx4ZE1vFPIuxYk0g7/kjEHb8Sece3JIDjSxLCURQfrwURERERERERERERERERERERdegTb+mXJwX1alEAAAAASUVORK5CYII=" width="25px" height="25px">
                </div>
            <?php } else { ?>
                <div>
                    <div style="float: left; width: 60%;">
                        <?php echo nbs(69); ?> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAADICAMAAACahl6sAAAAZlBMVEUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABwbJTWAAAAIXRSTlMAIjEyMzQ1Njk7PkJDRUZHUbW9vr/AwcfIycrOz9DR0tMaZRLDAAAB1klEQVRo3u3aCVLCQBBG4bhvuKBiiBqw739JC1ERmcAkoUj/Xe8dgJmvBoqkk6IgIiIiIiIiIiIiIiIiIiIiIiIaqqMgjjc7CeGYmtlxEEcEydJh8t+uH4e6ZOUwOwviMDsN4jA7D+JQlWw6zC6COMyu5BzPSYfNY5yHveDAgQMHDhw4cODAgQMHDhw4cODAgQMHDhw4cODAgQMHDhw4bHK4HVw+7eNTJmlHfTjHyGwa4TxuFuuV+r+P0XLFMoijp2R4x+1q1TKIo4dkeMfd+splEEdHyfCO+83VS0XHQ2r9ck+OA/4PXqd38Kh2XVIU7+k9lFrnsajqLfFy3d5X4uf+o5/E031UH4mv+8EGyVTN0V3i7/68m8TjnKGLxOe8pL1k5nTu01ZSu51ftZPUjudwbSS163livqR2PhfNldTu57t5Ev+OPImCI0ei4dgtUXHskug4tkuUHNskMxdzhvzm6f2Oxw7mPns5E7HzaClx/ry2CuLIlgg8P6+COLIkIu8zVEEcOyVC75dUQRxbJWLv+1RBHI0SOUeDRNCRlEg6EhJRx4ZE1vFPIuxYk0g7/kjEHb8Sece3JIDjSxLCURQfrwURERERERERERERERERERERdegTb+mXJwX1alEAAAAASUVORK5CYII=" width="25px" height="25px">

                    </div>
                    <div style="float: right; width: 40%;">
                        <label><?php echo $jobs->HospitalDetail ?></label>
                    </div>
                </div>
            <?php  } ?>
            <!-- --------------------------------------------------------------------------------------------- -->
            <?php
            if ($jobs->Others == "ไม่มี") { ?>
                <div style="padding-bottom: 134px;">
                </div>
            <?php } else { ?>
                <div style="padding-left: 170px; padding-bottom: 113px;">
                    <label><?php echo $jobs->OthersDetail ?></label>
                </div>
            <?php  } ?>
            <!-- --------------------------------------------------------------------------------------------- -->
            <div>
                <div style="float: left; width: 1px;">
                    <?php echo nbs(25); ?><label><?php echo $userinfo->CLINICNAME ?></label>
                </div>
                <div style="float: left; width: 1px;">
                    <?php echo nbs(96); ?><label><?php echo $d ?></label>
                </div>
                <div style="float: left; width: 1px;">
                    <?php echo nbs(111); ?><label><?php echo $m ?></label>
                </div>
                <div style="float: left; width: 1px;">
                    <?php echo nbs(135); ?><label><?php echo $y ?></label>
                </div>
            </div>
            <!-- --------------------------------------------------------------------------------------------- -->
            <div>
                <?php echo nbs(50); ?><label><?php echo $userinfo->UserName ?></label>
            </div>
            <div style="padding-top: 4px;">
                <div style="float: left; width: 1px;">
                    <?php echo nbs(55); ?><label><?php echo $userinfo->License ?></label>
                </div>
                <div style="float: left; width: 1px;">
                    <?php echo nbs(95); ?><label><?php echo $userinfo->CLINICNAME ?></label>
                </div>
            </div>
            <!-- --------------------------------------------------------------------------------------------- -->
            <div style="padding-top: 3px;">
                <?php echo nbs(17); ?><label><?php echo "$userinfo->cif_address" ?>
                    <?php echo "ต. $userinfo->cif_subdistrict" ?>
                    <?php echo "อ. $userinfo->cif_district" ?>
                    <?php echo "จ. $userinfo->cif_province" ?>
                    <?php echo " $userinfo->cif_postal" ?></label>
            </div>
            <div style="padding-top: 2px;">
                <?php echo nbs(50); ?><label><?php echo $patients->PATIEN_NAME ?></label>
            </div>
            <div style="padding-top: 2px;">
                <div style="float: left; width: 1px;">
                    <?php echo nbs(27); ?><label><?php echo $d ?></label>
                </div>
                <div style="float: left; width: 1px;">
                    <?php echo nbs(47); ?><label><?php echo $m ?></label>
                </div>
                <div style="float: left; width: 1px;">
                    <?php echo nbs(72); ?><label><?php echo $y ?></label>
                </div>
            </div>
            <!-- --------------------------------------------------------------------------------------------- -->
            <div style="padding-top: 2px;">
                <div style="float: left; width: 1px;">
                    <?php echo nbs(23); ?>
                    <?php if ($health != "null") {
                        echo "<label>$health->Wieght</label>";
                    } ?>
                </div>
                <div style="float: left; width: 1px;">
                    <?php echo nbs(47); ?>
                    <?php if ($health != "null") {
                        echo "<label>$health->Height</label>";
                    } ?>
                </div>
                <div style="float: left; width: 1px;">
                    <?php echo nbs(88); ?>
                    <?php if ($health != "null") {
                        echo "<label>$health->BP</label>";
                    } ?>
                </div>
                <div style="float: left; width: 1px;">
                    <?php echo nbs(122); ?>
                    <?php if ($health != "null") {
                        echo "<label>$health->HR</label>";
                    } ?>
                </div>
            </div>
            <!-- --------------------------------------------------------------------------------------------- -->
            <?php
            if ($jobs->BodyHealth == "ปกติ") { ?>
                <div style="padding-top: 7px;">
                    <div style="float: left; width: 1;">
                        <?php echo nbs(42); ?> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAADICAMAAACahl6sAAAAZlBMVEUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABwbJTWAAAAIXRSTlMAIjEyMzQ1Njk7PkJDRUZHUbW9vr/AwcfIycrOz9DR0tMaZRLDAAAB1klEQVRo3u3aCVLCQBBG4bhvuKBiiBqw739JC1ERmcAkoUj/Xe8dgJmvBoqkk6IgIiIiIiIiIiIiIiIiIiIiIiIaqqMgjjc7CeGYmtlxEEcEydJh8t+uH4e6ZOUwOwviMDsN4jA7D+JQlWw6zC6COMyu5BzPSYfNY5yHveDAgQMHDhw4cODAgQMHDhw4cODAgQMHDhw4cODAgQMHDhw4bHK4HVw+7eNTJmlHfTjHyGwa4TxuFuuV+r+P0XLFMoijp2R4x+1q1TKIo4dkeMfd+splEEdHyfCO+83VS0XHQ2r9ck+OA/4PXqd38Kh2XVIU7+k9lFrnsajqLfFy3d5X4uf+o5/E031UH4mv+8EGyVTN0V3i7/68m8TjnKGLxOe8pL1k5nTu01ZSu51ftZPUjudwbSS163livqR2PhfNldTu57t5Ev+OPImCI0ei4dgtUXHskug4tkuUHNskMxdzhvzm6f2Oxw7mPns5E7HzaClx/ry2CuLIlgg8P6+COLIkIu8zVEEcOyVC75dUQRxbJWLv+1RBHI0SOUeDRNCRlEg6EhJRx4ZE1vFPIuxYk0g7/kjEHb8Sece3JIDjSxLCURQfrwURERERERERERERERERERERdegTb+mXJwX1alEAAAAASUVORK5CYII=" width="25px" height="25px">
                    </div>
                    <div style="float: left; width: 1;">
                        <?php echo nbs(80); ?> <label><?php echo $jobs->BodyHealthDetail ?></label>
                    </div>
                </div>
            <?php } else { ?>
                <div style="padding-top: 7px;">
                    <div style="float: left; width: 1;">
                        <?php echo nbs(55); ?> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAADICAMAAACahl6sAAAAZlBMVEUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABwbJTWAAAAIXRSTlMAIjEyMzQ1Njk7PkJDRUZHUbW9vr/AwcfIycrOz9DR0tMaZRLDAAAB1klEQVRo3u3aCVLCQBBG4bhvuKBiiBqw739JC1ERmcAkoUj/Xe8dgJmvBoqkk6IgIiIiIiIiIiIiIiIiIiIiIiIaqqMgjjc7CeGYmtlxEEcEydJh8t+uH4e6ZOUwOwviMDsN4jA7D+JQlWw6zC6COMyu5BzPSYfNY5yHveDAgQMHDhw4cODAgQMHDhw4cODAgQMHDhw4cODAgQMHDhw4bHK4HVw+7eNTJmlHfTjHyGwa4TxuFuuV+r+P0XLFMoijp2R4x+1q1TKIo4dkeMfd+splEEdHyfCO+83VS0XHQ2r9ck+OA/4PXqd38Kh2XVIU7+k9lFrnsajqLfFy3d5X4uf+o5/E031UH4mv+8EGyVTN0V3i7/68m8TjnKGLxOe8pL1k5nTu01ZSu51ftZPUjudwbSS163livqR2PhfNldTu57t5Ev+OPImCI0ei4dgtUXHskug4tkuUHNskMxdzhvzm6f2Oxw7mPns5E7HzaClx/ry2CuLIlgg8P6+COLIkIu8zVEEcOyVC75dUQRxbJWLv+1RBHI0SOUeDRNCRlEg6EhJRx4ZE1vFPIuxYk0g7/kjEHb8Sece3JIDjSxLCURQfrwURERERERERERERERERERERdegTb+mXJwX1alEAAAAASUVORK5CYII=" width="25px" height="25px">
                    </div>
                    <div style="float: right; width: 1;">
                        <?php echo nbs(80); ?> <label><?php echo $jobs->BodyHealthDetail ?></label>
                    </div>
                </div>
            <?php  } ?>
            <!-- --------------------------------------------------------------------------------------------- -->
            <div style="padding-top: 136px; padding-left: 38px; height: 43px;"><?php echo nbs(26); ?>
                <label><?php echo $jobs->OtherSymptoms ?></label>
            </div>
            <!-- --------------------------------------------------------------------------------------------- -->
            <div style="padding-left: 45px; height: 66px;"><?php echo nbs(43); ?>
                <label><?php echo $jobs->Recommendation ?></label>
            </div>
        <?php } ?>
    <?php } ?>
</body>

</html>