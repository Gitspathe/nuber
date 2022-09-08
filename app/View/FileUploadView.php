<?php
// Notice that user must upload documents.
if($_SESSION["user_uploadedDocuments"] === 0) { ?>
<div class="mdl-card card-notice mdl-shadow--4dp">
    <div class="mdl-card__title mdl-color--deep-orange-500">
        <h2 class="mdl-card__title-text mdl-color-text--white">Documents</h2>
    </div>
    <div class="mdl-card__supporting-text">
        To confirm your identity as a driver, please upload your documents.<br>
        Accepted file types: zip, 7z, tar. Maximum 50mb.
    </div>
    <div class="mdl-card__actions">
        <?php if($error !== null) { ?>
            <p style="color:red;"><?php echo("Upload error: " . htmlspecialchars($error)); ?></p>
        <?php } else if($showSuccessMessage) { ?>
            <p style="color:green;"><?php echo("Your files were uploaded successfully."); ?></p>
        <?php } ?>
        <form action="" method="post", enctype="multipart/form-data">
            <input class="mdl-textfield__input" type="file" name="documents" value="">
            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect center" name="SubmitButton" style="display:block;">
                Upload
            </button>
        </form>
    </div>
</div>

<?php } else { ?>

<div class="mdl-card card-notice mdl-shadow--4dp">
    <div class="mdl-card__title mdl-color--teal-400">
        <h2 class="mdl-card__title-text mdl-color-text--white">Documents</h2>
    </div>
    <div class="mdl-card__supporting-text">
        Your documents have been uploaded. However, you may upload new documents if required.<br>
        Accepted file types: zip, 7z, tar. Maximum 50mb.
    </div>
    <div class="mdl-card__actions">
        <?php if($error !== null) { ?>
            <p style="color:red;"><?php echo("Upload error: " . htmlspecialchars($error)); ?></p>
        <?php } else if($showSuccessMessage) { ?>
            <p style="color:green;"><?php echo("Your files were uploaded successfully."); ?></p>
        <?php } ?>
        <form action="" method="post", enctype="multipart/form-data">
            <input class="mdl-textfield__input" type="file" name="documents" value="">
            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect center" name="SubmitButton" style="display:block;">
                Upload
            </button>
        </form>
    </div>
</div>

<?php } ?>