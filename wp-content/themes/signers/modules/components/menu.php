<?php $hasmenu=get_field('menu','option');?>
<?php if($hasmenu):?>
	<div class="site-menu">
		<?php 
		foreach($hasmenu as $menuItem):
			
			$first_level = $menuItem["first_level"];
			$first_level_only_text = $menuItem["first_level_only_text"];

			if ( $first_level_only_text == "" AND ( is_array($first_level) AND $first_level['title'] == "" OR !is_array($first_level) ) ) {
				continue;
			}

			$submenu_type = '';
			if((is_array($menuItem["submenu"])) && (count($menuItem["submenu"]))) $submenu_type = ' with-submenu';
			if ( $menuItem['two_columns_dropdown'] ) {
				$submenu_type .= ' twocolumns';

				$len = (int) count($menuItem["submenu"]);
				$submenu_right = array_slice($menuItem["submenu"], $len / 2);
				$menuItem["submenu"] = array_slice($menuItem["submenu"], 0, $len / 2);
				

			}
			?>
			<div class="site-menu__item <?php echo $submenu_type; ?>">
				<?php 
				if($first_level):
					if( $first_level ): ?>
						<a class="site-menu__first-level" href="<?php echo $first_level['url']; ?>" <?php echo (empty($first_level['target']))? '' : 'target="'. $first_level['target'].'"'; ?>><?php echo $first_level['title']; ?></a>
						<button class="site-menu__first-level__btn"></button>
					<?php endif;
				elseif($first_level_only_text):
					echo ($first_level_only_text)? '<div class="site-menu__first-level site-menu__first-level--text">'.$first_level_only_text.'</div>':''; 
				endif;
				?>

				<?php if((is_array($menuItem["submenu"])) && (count($menuItem["submenu"]))): ?>
					<div class="submenu submenu--<?php echo $submenu_type; ?>">

						<div>
						<?php foreach($menuItem["submenu"] as $submenu): ?>

							<?php if ( $submenu['separator'] ) {?>
								<div class="sep"></div>
							<?php 
							continue;
							} ?>

							<?php if( $link = $submenu["link"] ): ?>
								<a class="submenu__item <?php echo ($submenu['has_border'] ? "hasborder" : "");?>" href="<?php echo $link['url']; ?>" <?php echo (empty($link['target']))? '' : 'target="'. $link['target'].'"'; ?>>
									<?php if ($image = $submenu["image"]): ?>
										<div class="submenu__image">
											<?php get_template_part( 'modules/components/image', null, ['image' => $image] ); ?>
										</div>
                            					<?php endif; ?>
									<p class="submenu__title"><?php echo $link['title']; ?></p>
								</a>
							<?php endif; ?>
							<button class="back-btn"><?php esc_html_e( 'Back', 'palermo' ); ?></button>
						<?php endforeach;?>
						</div>

						<?php if ( $menuItem['two_columns_dropdown'] ) { ?>
							<div>
							<?php if((is_array($submenu_right)) && (count($submenu_right))): ?>
								
									<?php foreach($submenu_right as $submenu): ?>

										<?php if ( $submenu['separator'] ) {?>
											<div class="sep"></div>
										<?php 
										continue;
										} ?>

										<?php if( $link = $submenu["link"] ): ?>
											<a class="submenu__item <?php echo ($submenu['has_border'] ? "hasborder" : "");?>" href="<?php echo $link['url']; ?>" <?php echo (empty($link['target']))? '' : 'target="'. $link['target'].'"'; ?>>
												<?php if ($image = $submenu["image"]): ?>
													<div class="submenu__image">
														<?php get_template_part( 'modules/components/image', null, ['image' => $image] ); ?>
													</div>
															<?php endif; ?>
												<p class="submenu__title"><?php echo $link['title']; ?></p>
											</a>
										<?php endif; ?>
										<button class="back-btn"><?php esc_html_e( 'Back', 'palermo' ); ?></button>
									<?php endforeach;?>
								
							<?php endif; ?>
							</div>
						<?php } // if two_columns_dropdown ?>

					</div>
				<?php endif; ?>

				
			</div>
		<?php endforeach; ?>

		<?php get_template_part('modules/header/account'); ?>
		<?php get_template_part('modules/header/search'); ?>
	</div>
<?php endif; ?>
