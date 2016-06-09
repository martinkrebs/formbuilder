

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Form View</title>
    </head>
    <body>
    <?php if(isset($_POST['submit'])): ?>
        <h2>A form was submitted, with post data:</h2>
        <?php echo var_dump($_POST); ?>
    <?php else: ?>
        <h2>Simple Form</h2>
        <?php $simpleForm->render(); ?>
        <h2>Detailed Form Creation</h2>
        <?php $detailedForm->render(); ?>
    <?php endif; ?>
    </body>
</html>
