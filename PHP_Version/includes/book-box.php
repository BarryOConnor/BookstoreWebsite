                    <?php /******  build the html rows ******/
                    // display the results in a formatted fashion with icons
                    while ($book = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                        <article id="special<?php echo $book['bookID'];?>" class="boc-product-box">
                            <div class="imageholder">
                                <a href="book.php?id=<?php echo $book['bookID'];?>"><img src="<?php echo $book['image'];?>" alt="Book cover of the book <?php echo $book['title'];?>">
                                    <div class="cover-bg" style="background-image: url(&quot;<?php echo $book['image'];?>&quot;);"></div>
                                </a>
                            </div>
                            <h2>
                                <a href="book.php?id=<?php echo $book['bookID'];?>"><?php echo $book['title'];?></a>
                            </h2>
                            <?php echo str_replace("\n", "</p>\n<p>", '<p>'.$book['short_desc'].'</p>'); ?>
                            <div class="product-bottom">
                                <div class="boc-2-1-cols boc-center-vert">
                                    <p class="rating">
                                        <img src="images/ratings/stars<?php echo floor($book['score']);?>.gif" alt="rating:<?php echo $book['score'];?> out of 5 stars"><span><?php echo $book['score'];?></span>
                                    </p>
                                    <p class="price"><?php echo $book['special'] ? "<s>£".$book['price']."</s> £".$book['offer_price'] : "£".$book['price'];?></p>
                                </div>
                                <div class="boc-2-cols boc-center-both boc-grid-gap-tiny">
                                    <a href="javascript:void(0);" onclick="wishlistAction('add',<?php echo $book['bookID'];?><?php if(isset($_SESSION["current_user"])){ echo ',true'; } ?>)"><span><i class="fas fa-heart"></i>Add to Wishlist</span></a>
                                    <a href="javascript:void(0);" onclick="basketAction('add',<?php echo $book['bookID'];?>)"><span><i class="fas fa-shopping-cart"></i>Add to Basket</span></a>
                                </div>
                            </div>
                        </article>
                    <?php } ?>