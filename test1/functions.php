<?php
include 'db.php';
function escape($value)
{
    $value = trim($value);
    $search = array("\\", "\x00", "\n", "\r", "'", '"', "\x1a");
    $replace = array("\\\\", "\\0", "\\n", "\\r", "\'", '\"', "\\Z");
    return str_replace($search, $replace, $value);
}

foreach ($_POST as $k => $v) {
    $_POST[$k] = escape($v);
}
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'get_affiliated_societies_staff_with_types_by_affiliated_societies_id':
            get_affiliated_societies_staff_with_types_by_affiliated_societies_id($_POST['id']);
            break;
        default;
    }
}

function get_affiliated_societies()
{
    $r = q("SELECT * FROM affiliated_societies");
    for ($i = 0; $i < $r->num_rows; $i++) {
        $t = $r->fetch_assoc();
        ?>
        <div class="affiliated_societies flex">
        <div class="affiliated_societies_name">
           <?php echo $t['name'] ?>
        </div>
            <div class="affiliated_societies_btn"
                 onclick="get_affiliated_societies_staff_with_types_by_affiliated_societies_id( <?php echo $t['id'] ?>)">
                подробнее
            </div>
        </div>
        <?php

    }
}

function get_affiliated_societies_staff_with_types_by_affiliated_societies_id($id)
{
    $r = q("SELECT * FROM (SELECT `name` as `affiliated_societies_staff_name`,`type` FROM affiliated_societies_staff where id in (SELECT affiliated_societies_staff_id FROM affiliated_societies_staff_to_affiliated_societies where affiliated_societies_id= " . $id . ") order by name asc) as t1 
LEFT JOIN affiliated_societies_staff_types as t2
ON t1.type = t2.id ");
    ?>
    <table>
        <tr>
            <th>Имя</th>
            <th>Тип</th>
        </tr>
        <?php
        for ($i = 0; $i < $r->num_rows; $i++) {
            $t = $r->fetch_assoc();
            echo '<tr>';
            echo '<td>' . $t['affiliated_societies_staff_name'] . '</td>';
            echo '<td>' . $t['name'] . '</td>';
            echo '</tr>';
        }
        ?>
    </table>
    <?php
}

?>