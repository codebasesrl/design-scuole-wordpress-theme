<?php
/*
Template Name: circolare archimede
*/
get_header();
?>

    <main id="main-container" class="main-container">


<?php
$idCirc=$_GET['id'];
$json=file_get_contents("http://10.0.0.69:8580/archimede/seam/resource/rest/comunicazioni/circolare/$idCirc");
$json=json_decode($json);
$circolare=$json;

?>
<section class="section bg-white">
                <div class="container">
                    <div class="row variable-gutters">
                        <div class="col-md-12 article-title-author-container">
                            <div class="title-content">
                                <h1><?php echo $circolare->titolo; ?></h1>
                            </div><!-- /title-content -->
                        </div><!-- /col-md-6 -->
                    </div><!-- /row -->
                </div><!-- /container -->
            </section>
<section class="section bg-white">
                <div class="container ">
                    <article class="article-wrapper">


                        <div class="row variable-gutters">
                            <div class="col-lg-12">
                                <?php
                              	echo $circolare->corpo;
                                ?>
                            </div>
			</div>

<?php

if(!empty($circolare->allegatiSize))
{
?>
<br/>
        <h5>Allegati</h5>
        <ul>
    <?php
    
    foreach($circolare->allegati as $allegato)
    {
        ?>
            <li>
<?php $allegato_link = str_replace("http://10.0.0.69:8580", "https://a.registroarchimede.it", $allegato->link);?>
                <a href="<?php echo $allegato_link;?>">
                    <img src="https://a.registroarchimede.it/archimede/icons/attach.png" 
                         title="Allegato" alt="Allegato" style="margin:0px !important" />
                     
                    <?php echo $allegato->nome;?>
                </a>
            </li>
        <?php
    }
    
    ?>
        </ul>           
    <?php
}

?>
                        <div class="row variable-gutters">
                            <div class="col-lg-12">
			    
<div class="article-footer">
<p data-element="metadata"><strong>Circolare N.</strong><?php echo $circolare->numero;?><strong> Pubblicata il:</strong> <?php echo $circolare->data;?> </p>
</div>
</div><!-- /col-lg-9 -->
                        </div><!-- /row -->

                    </article>
                </div>
            </section>

    </main><!-- #main -->


<?php
get_footer();
