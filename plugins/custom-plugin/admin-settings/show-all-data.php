<h1> All data here </h1>
<?php

global $wpdb, $table_prefix;
$wp_custom_form = $table_prefix.'custom_form';
$sql = "SELECT * FROM $wp_custom_form";
$results = $wpdb->get_results($sql);
ob_start()
?>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Experience</th>
            <th>Email</th>
            <th>Current Salary</th>
            <th>Referred By</th>
            <th>Expected Salary</th>
            <th>Hometown</th>
            <th>Resume</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach($results as $row):
        ?>
        <tr>
            <td><?php echo $row->id;?></td>
            <td><?php echo $row->name;?></td>
            <td><?php echo $row->phone;?></td>
            <td><?php echo $row->experience;?></td>
            <td><?php echo $row->email;?></td>
            <td><?php echo $row->current_salary;?></td>
            <td><?php echo $row->referred_by;?></td>
            <td><?php echo $row->expected_salary;?></td>
            <td><?php echo $row->hometown;?></td>
            <td><?php echo $row->attach_resume;?></td>
        </tr>
        <?php
        endforeach;
        ?>
    </tbody>
</table>
<?php
echo ob_get_clean();
?>