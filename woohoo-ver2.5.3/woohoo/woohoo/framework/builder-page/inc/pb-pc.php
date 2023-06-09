<?php
/**
 * @license For the full license information, please view the Licensing folder
 * that was distributed with this source code.
 *
 * @package Woohoo News Theme
 */

// Prevent direct script access.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct script access allowed' );
}

function woohoo_pb_pc( $arr ) {
	?>
	<div class="postbox">

		<h3 >
			<span>Post Carousel</span>
		</h3>

		<div class="inside">
			<div class="my_meta_control">

				<div class="box_meta_inner">
					<table class="meta_box_table">
						<tbody>
						<tr>
							<th>Post Carousel :</th>
							<td>
								<input class="on-of" type="checkbox" name="bdaia_pc[onof]" id="bdaia_pc-onof" value="1" <?php if ( !empty( $arr['onof'] ) and $arr['onof'] == 1 ){ echo ' checked="checked"'; } ?> />
								<div class="box_meta_info">Check to enable, uncheck to disable.</div>
							</td>
						</tr>
						</tbody>
					</table>
				</div><!-- Post Carousel -->

                <div class="box_meta_inner">
                    <table class="meta_box_table">
                        <tbody>
                        <tr>
                            <th>Title :</th>
                            <td>
                                <input name="bdaia_pc[title]" type="text" id="bdaia_pc-title" value="<?php if( !empty( $arr['title'] ) ) echo $arr['title']; ?>" />
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div><!-- Title -->

                <div class="box_meta_inner">
                    <table class="meta_box_table">
                        <tbody>
                        <tr>
                            <th>Title Style :</th>
                            <td>
                                <select name="bdaia_pc[title_style]" id="bdaia_pc-title_style">
                                    <option value="title_style1" <?php if( !empty( $arr['title_style'] ) && $arr['title_style'] == 'title_style1' ) echo 'selected="selected"'; ?>>Style 1</option>
                                    <option value="title_style2" <?php if( !empty( $arr['title_style'] ) && $arr['title_style'] == 'title_style2' ) echo 'selected="selected"'; ?>>Style 2</option>
                                    <option value="title_style3" <?php if( !empty( $arr['title_style'] ) && $arr['title_style'] == 'title_style3' ) echo 'selected="selected"'; ?>>Style 3</option>
                                    <option value="title_style4" <?php if( !empty( $arr['title_style'] ) && $arr['title_style'] == 'title_style4' ) echo 'selected="selected"'; ?>>Style 4</option>
                                    <option value="title_style5" <?php if( !empty( $arr['title_style'] ) && $arr['title_style'] == 'title_style5' ) echo 'selected="selected"'; ?>>Style 5</option>
                                </select>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div><!-- Title Style -->

				<div class="box_meta_inner">
					<table class="meta_box_table">
						<tbody>
						<tr>
							<th>Speed:</th>
							<td>
								<input name="bdaia_pc[speed]" type="text" id="bdaia_pc-speed" value="<?php if( !empty( $arr['speed'] ) ) echo $arr['speed']; else echo '7000'; ?>" />
								<div class="box_meta_info">Select the Slider speed, 1000 = 1 second.</div>
							</td>
						</tr>
						</tbody>
					</table>
				</div><!-- box_meta_inner -->

				<div class="box_meta_inner">
					<table class="meta_box_table">
						<tbody>
						<tr>
							<th>Animation Speed:</th>
							<td>
								<input name="bdaia_pc[animation_speed]" type="text" id="bdaia_pc-animation_speed" value="<?php if( !empty( $arr['animation_speed'] ) ) echo $arr['animation_speed']; else echo '600'; ?>" />
								<div class="box_meta_info">Select the animation speed, 1000 = 1 second.</div>
							</td>
						</tr>
						</tbody>
					</table>
				</div><!-- box_meta_inner -->

				<div class="box_meta_inner">
					<table class="meta_box_table">
						<tbody>
						<tr>
							<th>Category Filter:</th>
							<td>
								<?php $bdaia_block_categories = get_categories(); ?>
								<select name="bdaia_pc[cat]" id="bdaia_pc-cat">
									<option value="" selected='selected'>- All categories -</option>
									<?php foreach( $bdaia_block_categories as $cat ){ ?>
										<option value="<?php echo esc_attr( $cat->slug );?>" <?php if( !empty( $arr['cat'] ) && $arr['cat'] == $cat->slug ){ echo "selected='selected'"; } ?>><?php echo esc_attr( $cat->name );?></option>
									<?php } ?>
								</select>
							</td>
						</tr>
						</tbody>
					</table>
				</div><!-- box_meta_inner -->

				<div class="box_meta_inner">
					<table class="meta_box_table">
						<tbody>
						<tr>
							<th>Multiple categories filter:</th>
							<td>
								<input name="bdaia_pc[cat_uids]" type="text" id="bdaia_pc-cat_uids" value="<?php if( !empty( $arr['cat_uids'] ) ) echo $arr['cat_uids']; ?>" />
								<div class="list_tags">
									<?php
									$bdaia_block_categories = get_categories();
									foreach ( $bdaia_block_categories as $cat ) {
										?><span onclick="add_cat( 'bdaia_pc-cat_uids', '<?php echo $cat->slug; ?>' )"><?php echo esc_attr( $cat->name ); ?></span><?php
									}
									?>
								</div>
							</td>
						</tr>
						</tbody>
					</table>
				</div><!-- box_meta_inner -->

				<div class="box_meta_inner">
					<table class="meta_box_table">
						<tbody>
						<tr>
							<th>Filter by tag slug:</th>
							<td>
								<input name="bdaia_pc[tag_slug]" type="text" id="bdaia_pc-tag_slug" value="<?php if( !empty( $arr['tag_slug'] ) ) echo $arr['tag_slug']; ?>" />
								<div class="list_tags">
									<?php
									$bdaia_block_tags = get_tags('orderby=count&order=desc&number=50');
									foreach ( $bdaia_block_tags as $cat ) {
										?><span onclick="add_cat( 'bdaia_pc-tag_slug', '<?php echo $cat->slug; ?>' )"><?php echo esc_attr( $cat->name ); ?></span><?php
									}
									?>
								</div>
							</td>
						</tr>
						</tbody>
					</table>
				</div><!-- box_meta_inner -->

				<div class="box_meta_inner">
					<table class="meta_box_table">
						<tbody>
						<tr>
							<th>Multiple Posts filter:</th>
							<td>
								<input name="bdaia_pc[posts]" type="text" id="bdaia_pc-posts" value="<?php if( !empty( $arr['posts'] ) ) echo $arr['posts']; ?>" />
								<div class="box_meta_info">Filter multiple posts by ID( ex: 41, 352 ).</div>
							</td>
						</tr>
						</tbody>
					</table>
				</div><!-- box_meta_inner -->

				<div class="box_meta_inner">
					<table class="meta_box_table">
						<tbody>
						<tr>
							<th>Sort order:</th>
							<td>
								<select name="bdaia_pc[sort_order]" id="bdaia_pc-sort_order">
									<option value="" <?php if( !empty( $arr['sort_order'] ) && $arr['sort_order'] == '' || !empty( $arr['sort_order'] ) && $arr['sort_order']=='' ) echo 'selected="selected"'; ?>>- Latest -</option>
									<option value="popular" <?php if( !empty( $arr['sort_order'] ) && $arr['sort_order'] == 'popular' ) echo 'selected="selected"'; ?>>Popular (all time)</option>
									<option value="alphabetical_order" <?php if( !empty( $arr['sort_order'] ) && $arr['sort_order'] == 'alphabetical_order' ) echo 'selected="selected"'; ?>>Alphabetical A -&gt; Z</option>
									<option value="review_high" <?php if( !empty( $arr['sort_order'] ) && $arr['sort_order'] == 'review_high' ) echo 'selected="selected"'; ?>>Highest rated (reviews)</option>
									<option value="comment_count" <?php if( !empty( $arr['sort_order'] ) && $arr['sort_order'] == 'comment_count' ) echo 'selected="selected"'; ?>>Most Commented</option>
									<option value="random_posts" <?php if( !empty( $arr['sort_order'] ) && $arr['sort_order'] == 'random_posts' ) echo 'selected="selected"'; ?>>Random Posts</option>
									<option value="random_today" <?php if( !empty( $arr['sort_order'] ) && $arr['sort_order'] == 'random_today' ) echo 'selected="selected"'; ?>>Random posts Today</option>
									<option value="random_7_day" <?php if( !empty( $arr['sort_order'] ) && $arr['sort_order'] == 'random_7_day' ) echo 'selected="selected"'; ?>>Random posts from last 7 Day</option>
								</select>
							</td>
						</tr>
						</tbody>
					</table>
				</div><!-- box_meta_inner -->

				<div class="box_meta_inner">
					<table class="meta_box_table">
						<tbody>
						<tr>
							<th>Limit post number:</th>
							<td>
								<input name="bdaia_pc[num_posts]" type="text" id="bdaia_pc-num_posts" value="<?php if( !empty( $arr['num_posts'] ) ) echo $arr['num_posts']; else echo '4'; ?>" />
							</td>
						</tr>
						</tbody>
					</table>
				</div><!-- box_meta_inner -->

				<div class="box_meta_inner">
					<table class="meta_box_table">
						<tbody>
						<tr>
							<th>Offset posts:</th>
							<td>
								<input name="bdaia_pc[offset]" type="text" id="bdaia_pc-offset" value="<?php if( !empty( $arr['offset'] ) ) echo $arr['offset']; ?>" />
							</td>
						</tr>
						</tbody>
					</table>
				</div><!-- box_meta_inner -->

			</div>
		</div>
	</div>
<?php } ?>


