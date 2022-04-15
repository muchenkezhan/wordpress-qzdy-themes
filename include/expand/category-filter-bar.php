<?php 
if (!_qzdy('is_filter_bar')) {
$currentterm = get_queried_object();
if (!empty($currentterm)) {
    $currentterm_id  = $currentterm->term_id;
    $parent_id = $currentterm->parent;
}else{
    $currentterm_id  = 0;
    $parent_id  = 0;
}

$top_term_id = (is_category()) ? get_category_root_id($currentterm_id ) : 0 ;
$current_array = array($currentterm_id);

while($parent_id){
    $current_array[] = $parent_id;
    $parent_term = get_term($parent_id,'category');
    $parent_id = $parent_term->parent;
}

?>


<div class="filter--content">
    <form class="mb-0" method="get" action="<?php echo home_url(); ?>">
        <input type="hidden" name="s">
        <div class="form-box search-properties mb-0">
            <!-- 一级分类 -->
            <?php if (_qzdy('is_filter_item_cat','1')){ ?>
            <div class="filter-item">
                <?php
                $filter_cat_1=_qzdy('archive_filter_cat_1');
                echo '<ul class="filter-tag"><span><i class="fa fa-folder-open-o"></i> 分类筛选</span>';
                if (!empty($filter_cat_1)) {
                    foreach ($filter_cat_1 as $_cid) {
                        $item = get_term($_cid,'category');
                        if (!empty($item)) {
                            $is_current = (in_array($item->term_id,$current_array)) ? ' class="on"' : '' ;
                            echo '<li><a'.$is_current.' href="'.get_category_link($item->term_id).'">'.$item->name.'</a></li>';
                        }
                    }
                } else {
                    echo '<li>请在后台-主题设置-分类页筛选-一级主分类筛选配置和排序您的主分类筛选</li>';
                }
                echo "</ul>";
                ?>
            </div>
            <?php }
            if (_qzdy('is_filter_item_cat2','1')) {
                $cat_orderby = _qzdy('is_filter_item_cat_orderby','id');
                $child_categories = get_terms('category', array('hide_empty' => 0,'parent' => $top_term_id,'orderby' =>$cat_orderby,'order' => 'DESC'));
                if ($top_term_id && !empty($child_categories)) {
                    $child2 = get_category($top_term_id);
                    $is_child3 = 0 ;
                   echo '<div class="filter-item"><ul class="filter-tag"><span><i class="fa fa-folder-open-o"></i> '.$child2->name.'</span>';
                    foreach ($child_categories as $item) {
                        $is_current = (in_array($item->term_id,$current_array)) ? ' class="on"' : '' ;
                        if (!empty($is_current)) {
                          $is_child3 = $item->term_id;
                        }
                        echo '<li><a'.$is_current.' href="'.get_category_link($item->term_id).'">'.$item->name.'</a></li>';
                    }
                    echo '</ul></div>';
                    $child_categories = get_terms('category', array('hide_empty' => 0,'parent' => $is_child3,'orderby' =>$cat_orderby,'order' => 'DESC'));
                    if (_qzdy('is_filter_item_cat3','1') && $is_child3>0  && !empty($child_categories)) {
                    $child3 = get_category($is_child3);
                      echo '<div class="filter-item"><ul class="filter-tag"><span><i class="fa fa-folder-open-o"></i> '.$child3->name.'</span>';
                      foreach ($child_categories as $item) {
                          $is_current = (in_array($item->term_id,$current_array)) ? ' class="on"' : '' ;
                          echo '<li><a'.$is_current.' href="'.get_category_link($item->term_id).'">'.$item->name.'</a></li>';
                      }
                      echo '</ul></div>';
                    }
                }
            ?>
            <?php } ?>
            <?php if (_qzdy('is_filter_item_tags','1')){
                $currentterm_id = get_query_var('cat'); 
                $this_cat_arg = array( 'categories' => $currentterm_id);

                  $tags = _get_category_tags($this_cat_arg);
                if(!empty($tags)) {
                    echo '<div class="filter-item">';
                    $content = '<ul class="filter-tag"><span><i class="fa fa-tags"></i> 相关标签</span>';
                      foreach ($tags as $tag) {
                        $content .= '<li><a href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a></li>';
                      }
                    $content .= "</ul>";
                    echo $content;
                    echo '</div>';
                }
            }?>
        </div>
    </form>
</div>
<?php }?>
