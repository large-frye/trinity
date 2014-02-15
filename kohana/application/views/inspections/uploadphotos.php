<div class="section">
    <div class="box">
        <div class="title">Upload Photos<span class="hide"></span></div>
        <div id="photoContainer">
            <?php echo Form::open('', array('enctype' => 'multipart/form-data', 'class' => 'photoUpload')); ?>
                <input name="filesToUpload[]" id="filesToUpload" type="file" multiple="multiple" />
                <button type="submit" class="photoBut" id="photo" name="photo" value="Submit" /> Submit Photos</button>
            </form>
        </div>
    </div>
</div>