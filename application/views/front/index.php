<?php include 'includes/header.php'; ?>

<?php
    $this->session->set_flashdata('currentURL', current_url());
?>

<div class="body-container">
    <?php include 'pages/'.$page_name.'.php'; ?>
</div>
<?php include 'includes/footer.php'; ?>