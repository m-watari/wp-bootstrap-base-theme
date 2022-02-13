<?php
/* 最新記事リスト */
function getNewItems($atts) {
    extract(shortcode_atts(array(
        "num" => '', //最新記事リストの取得数
        "cat" => '', //表示する記事のカテゴリー指定
        "days" => '', //何日以内の記事にadd_textをつけるか指定
        "add_text" => '' //表示するテキスト
    ), $atts));
    global $post;
    $oldpost = $post;
    $myposts = get_posts('numberposts='.$num.'&order=DESC&orderby=post_date&category='.$cat);
    // $retHtml.='';
    $retHtml.='<div class="my-3 p-3 bg-body rounded shadow-sm">';
    $retHtml.='<h6 class="border-bottom pb-2 mb-0">News</h6>';
    foreach($myposts as $post) :
    $cat = get_the_category();
    $catname = $cat[0]->cat_name;
    $catslug = $cat[0]->slug;
        setup_postdata($post);
        // $retHtml.='<li>';
        // $retHtml.='<span class="news_date">'.get_post_time( get_option( 'date_format' )).'</span>';
        // $retHtml.='<span class="cat '.$catslug.'">'.$catname.'</span>';
        // $retHtml.='<span class="news_title"><a href="'.get_permalink().'">'.the_title("","",false).'</a></span>';
        
        $retHtml.='<div class="d-flex text-muted pt-3">';
        // $retHtml.='<svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>';
        $retHtml.='<p class="pb-3 mb-0 small lh-sm border-bottom w-100">';
        $retHtml.='<strong class="d-block text-gray-dark"><span class="cat '.$catslug.'">'.$catname.'</span></strong>';
        $retHtml.='<span class="news_date">'.get_post_time( get_option( 'date_format' )).'</span>&nbsp<a href="'.get_permalink().'">'.the_title("","",false).'</a>';
        $retHtml.='';
        
    //指定日以内にadd_textをつける
    $today = date_i18n('U');
    $entry_day = get_the_time('U');
    $past_days = date('U',($today - $entry_day)) / 86400;
      if ( $days > $past_days ):
        $retHtml.='&nbsp<span class="badge bg-success">'.$add_text.'</span>';
      endif;
        $retHtml.='</p></div>';
    endforeach;
    $retHtml.='</div>';
    $post = $oldpost;
    wp_reset_postdata();
    return $retHtml;
}
add_shortcode("newsNew", "getNewItems"); //getNewItemsは関数名、newsNewはショートコード名


function getNewItems3col($atts) {
    extract(shortcode_atts(array(
        "num" => '', //最新記事リストの取得数
        "cat" => '', //表示する記事のカテゴリー指定
        "days" => '', //何日以内の記事にadd_textをつけるか指定
        "add_text" => '' //表示するテキスト
    ), $atts));
    global $post;
    $oldpost = $post;
    $myposts = get_posts('numberposts='.$num.'&order=DESC&orderby=post_date&category='.$cat);
    // var_dump($myposts);
    $retHtml.='<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';
    // $retHtml.='<h6 class="border-bottom pb-2 mb-0">Recent updates</h6>';
    foreach($myposts as $post) :
    $cat = get_the_category();
    // $thumbnail = get_the_post_thumbnail( $post->ID, 'thumbnail' );
    if (get_the_post_thumbnail( $post->ID, array(500) )) {
        $thumbnail = get_the_post_thumbnail( $post->ID, array(500) );
    } else {
        $thumbnail = '<svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">NoImage</text>
    </svg>';
    }
    // $catname = $cat[0]->cat_name;
    // $catslug = $cat[0]->slug;
        setup_postdata($post);
    $content = get_the_content();
    $content = str_replace(array("\r\n", "\r", "\n"), '', $content);
    $content = str_replace('\n', '', mb_substr(strip_tags($content), 0, 100,'UTF-8'));
    $backspace = '/[\x08]/';
    $content  = preg_replace("/( |　)/", "", $content );
    $content = preg_replace ( $backspace , '' , $content );
    // $title = the_title();

        // $retHtml.='<div class="col col-top">';
        // $retHtml.='<div class="card shadow-sm">';               
        // $retHtml.=$thumb;    
        // $retHtml.='<div class="card-body"><a href="'.the_permalink().'"><h3 class="postCardTitle">'.the_title().'</h3></a><p class="card-text">'.$content.'</div>'; 
        // $retHtml.='</div>';
        // $retHtml.='</div>';

        $retHtml.='<div class="col"><div class="card shadow-sm">';
        // $retHtml.='<svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>';
        $retHtml.= '<a href="'.get_permalink().'">'.$thumbnail.'</a>';
        $retHtml.='<div class="card-body">';
        $retHtml.='<a href="'.get_permalink().'"><p class="card-title"><h3 class="postCardTitle">'.the_title("","",false).'</h3></a>';
        $retHtml.=''.$content.'</p>';
        // $retHtml.='<div class="d-flex justify-content-between align-items-center">';
        $retHtml.='</div></div></div>';
        // $retHtml.='</div>';

        
    //指定日以内にadd_textをつける
    // $today = date_i18n('U');
    // $entry_day = get_the_time('U');
    // $past_days = date('U',($today - $entry_day)) / 86400;
    //   if ( $days > $past_days ):
    //     $retHtml.='&nbsp<span class="badge bg-success">'.$add_text.'</span>';
    //   endif;
    //     $retHtml.='</div></div>';
    endforeach;
    $retHtml.='</div>';
    $post = $oldpost;
    wp_reset_postdata();
    return $retHtml;
}
add_shortcode("newsNew3col", "getNewItems3col"); //getNewItemsは関数名、newsNewはショートコード名