<?php
$title = get_page_title();

$words = explode(' ', $title);
$firstWord = array_shift($words);

if (mb_strlen($firstWord) < 5 && isset($words[0])) {
    $firstWord .= ' ' . array_shift($words);
}

$restOfTitle = $words ? implode(' ', $words) : '';
?>
 
<div class="header-bottom">
    <div class="container">
        <div class="bottom-menu">
            <h2 class="bottom-menu__title">
                <span class="part1"><?php echo $firstWord; ?></span>
                <?php if ($restOfTitle): ?>
                    <span class="part2"><?php echo $restOfTitle; ?></span>
                <?php endif; ?>
            </h2>
            <div class="breadcrambs">
                <a href="/">Home</a>
                <span class="breadcrambs-pointer"> >> </span>
                <span><?php echo $title; ?></span>
            </div>
        </div>
    </div>
</div>
