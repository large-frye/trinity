<?php echo $header; ?>
<div id="container">
    <div class="nav">
        <ul>
        <?php for ( $i = 0, $max = count($menu); $i < $max; $i++ ): ?>
            <li><a href="<?php echo $menu[$i]['link']; ?>"><?php echo $menu[$i]['name'] ?></a></li>
        <?php endfor; ?>
        </ul>
    </div>
    <div class="content">
        <?php echo (isset($content))? $content : ''; ?>
    </div>
</div>
<?php echo $footer; ?>