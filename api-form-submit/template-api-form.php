<?php 
/*
    Template Name: Api Form Submit
*/
?>
<?php get_header(); ?>
<div>
<form method="POST" id="mainform" name="mainform">
<input type="text" name="name" placeholder="Name"><br>
    <input type="text" name="email" placeholder="Email"><br>
    <input type="number" name="pincode" placeholder="PinCode"><br>
    <input type="text" name="address" placeholder="Address"><br>
    <input type="text" name="residency" placeholder="Residency"><br>
    <input type="button" name="submit" value="Submit" id="submitid" >
</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#submitid').click(function(e){
            var url = "<?php echo get_site_url(); ?>/wp-json/apisubmit/v2/formsubmitapi";
            $.ajax({
                url: url,
                type: 'POST',
                data: $('#mainform').serialize(),
                success: function(result){
                    console.log(result.name);
                }
            });
        });
    });
</script>

<?php get_footer(); ?>
