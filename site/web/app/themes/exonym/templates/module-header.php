<?php
  $headerType = get_field('header_type');
  $header = get_field('header_content');
  $headerImage = $header['image'];
  $headerData = $header['data'];
?>
<header class="page-header animate-parallax animate-z-extreme header-height-<?php echo $headerType; ?>">
  <?php if(!empty($headerImage)) { echo '<div class="module-bg" style="background-image: url(' . $headerImage['url'] . ')"></div>'; } ?>
    <section class="header-content">
      <?php if(!empty($headerData['headline'])) { echo '<h1>' . $headerData['headline'] . '</h1>'; } ?>
      <?php if(!empty($headerData['description'])) { echo '<p>' . $headerData['description'] . '</p>'; } ?>
      <?php if(!empty($headerData['button'])): ?>
        <a href="<?php echo $headerData['button']['url']; ?>" target="<?php echo  $headerData['button']['target']; ?>">
          <button type="button">
            <span><?php echo $headerData['button']['title']; ?></span>
            <span class="button-arrow"><?php echo file_get_contents(asset_path('images/icon-arrow.svg')); ?></span>
          </button>
        </a>
      <?php endif; ?>
    </section>
</header>
