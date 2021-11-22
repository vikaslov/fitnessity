<div id="mykickboxing<?= $companyid ?>" class="mykickboxing modal kickboxing-moredetails" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="header-content">
                    <div class="addcompare"><a href="#" class="btnaddc">Add To Compare</a> <a href="#" class="inquirylink"><i class="fa fa-question-circle" aria-hidden="true"></i></a></div>
                    <div class="ratset-righthead">                                
                        <div class="ratset-threetxt">
                            <p><i class="fa fa-star" aria-hidden="true"></i> 4.6 (146)</p>
                            <div class="favtxt"><img src="{{ url('public/img/heartplus-icon.png') }}"> Favorite</div>
                            <div class="reviewtxt"><img src="{{ url('public/img/comment-icon.png') }}"> Submit Review</div>
                            <div class="sharetxt"><img src="{{ url('public/img/share-icon.png') }}"> Share</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <?php
                if (File::exists(public_path("/uploads/profile_pic/thumb/" . $service['profile_pic']))) {
                    $profilePic = url('/public/uploads/profile_pic/thumb/' . $service['profile_pic']);
                } else {
                    $profilePic = '/public/images/default-avatar.png';
                }
                ?>
                <img src="{{ $profilePic }}" class="kickboximg-big">
                <div class="col-md-7">
                    <h3><?= $service['program_name'] ?></h3>
                    <p>About<br/><?= $service['program_desc'] ?></p>
                    <div class="review-blockkick">
                        <h5>Add Review & Rate</h5>
                        <div class="ratestar">
                            <div>
                                <span>Quality</span>
                                <? for($a=0; $a<10; $a++) { ?>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <? } ?>
                                <span><img src="{{ url('public/img/emoji.png') }}"> Excellent</span>
                            </div>
                            <div>
                                <span>Location</span>
                                <? for($a=0; $a<10; $a++) { ?>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <? } ?>
                                <span><img src="{{ url('public/img/emoji.png') }}"> Excellent</span>
                            </div>
                            <div>
                                <span>Space</span>
                                <? for($a=0; $a<10; $a++) { ?>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <? } ?>
                                <span><img src="{{ url('public/img/emoji.png') }}"> Excellent</span>
                            </div>
                            <div>
                                <span>Service</span>
                                <? for($a=0; $a<10; $a++) { ?>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <? } ?>
                                <span><img src="{{ url('public/img/emoji.png') }}"> Excellent</span>
                            </div>
                            <div>
                                <span>Price</span>
                                <? for($a=0; $a<10; $a++) { ?>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <? } ?>
                                <span><img src="{{ url('public/img/emoji.png') }}"> Excellent</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 right-person">
                    <div class="fromblock">
                        <h3>From $150 <span> / person</span></h3>
                        <div class="multiselect-block">
                            <select id="" name="" class="form-control activityselect1">
                                <option value="">Activity Offered</option>
                                <option {{ ($sport_activity=='Aerobics')?'selected':''}}>Aerobics</option>
                                <option {{ ($sport_activity=='Archery')?'selected':''}}>Archery</option>
                                <option {{ ($sport_activity=='Badminton')?'selected':''}}>Badminton</option>
                                <option {{ ($sport_activity=='Barre')?'selected':''}}>Barre</option>
                                <option {{ ($sport_activity=='Baseball')?'selected':''}}>Baseball</option>
                                <option {{ ($sport_activity=='Basketball')?'selected':''}}>Basketball</option>
                                <option {{ ($sport_activity=='Beach Vollyball')?'selected':''}}>Beach Vollyball</option>
                                <option {{ ($sport_activity=='Bouldering')?'selected':''}}>Bouldering</option>
                                <option {{ ($sport_activity=='Bungee Jumping')?'selected':''}}>Bungee Jumping</option>
                                <optgroup label="Camps &amp; Clinics">
                                    <option {{ ($sport_activity=='Day Camp')?'selected':''}}>Day Camp</option>
                                    <option {{ ($sport_activity=='Sleep Away')?'selected':''}}>Sleep Away</option>
                                    <option {{ ($sport_activity=='Winter Camp')?'selected':''}}>Winter Camp</option>
                                </optgroup>
                                <option {{ ($sport_activity=='Canoeing')?'selected':''}}>Canoeing</option>
                                <optgroup label="Cycling">
                                    <option {{ ($sport_activity=='Indoor cycling')?'selected':''}}>Indoor cycling</option>
                                </optgroup>
                                <option {{ ($sport_activity=='Dance')?'selected':''}}>Dance</option>
                                <option {{ ($sport_activity=='Diving')?'selected':''}}>Diving</option>
                                <optgroup label="Field Hockey">
                                    <option {{ ($sport_activity=='Ice Hockey')?'selected':''}}>Ice Hockey</option>
                                </optgroup>
                                <option {{ ($sport_activity=='Football')?'selected':''}}>Football</option>
                                <option {{ ($sport_activity=='Golf')?'selected':''}}>Golf</option>
                                <option {{ ($sport_activity=='Gymnastics')?'selected':''}}>Gymnastics</option>
                                <option {{ ($sport_activity=='Hang Gliding')?'selected':''}}>Hang Gliding</option>
                                <option {{ ($sport_activity=='Hiit')?'selected':''}}>Hiit</option>
                                <option {{ ($sport_activity=='Hiking - Backpacking')?'selected':''}}>Hiking - Backpacking</option>
                                <option {{ ($sport_activity=='Horseback Riding')?'selected':''}}>Horseback Riding</option>
                                <option {{ ($sport_activity=='Ice Skating')?'selected':''}}>Ice Skating</option>
                                <option {{ ($sport_activity=='Kayaking')?'selected':''}}>Kayaking</option>
                                <option {{ ($sport_activity=='lacrosse')?'selected':''}}>lacrosse</option>
                                <option {{ ($sport_activity=='Laser Tag')?'selected':''}}>Laser Tag</option>
                                <optgroup label="Martial Arts">
                                    <option {{ ($sport_activity=='Boxing')?'selected':''}}>Boxing</option>
                                    <option {{ ($sport_activity=='Jiu-Jitsu')?'selected':''}}>Jiu-Jitsu</option>
                                    <option {{ ($sport_activity=='Karate')?'selected':''}}>Karate</option>
                                    <option {{ ($sport_activity=='Kick Boxing')?'selected':''}}>Kick Boxing</option>
                                    <option {{ ($sport_activity=='Kung Fu')?'selected':''}}>Kung Fu</option>
                                    <option {{ ($sport_activity=='MMA')?'selected':''}}>MMA</option>
                                    <option {{ ($sport_activity=='Self-Defense')?'selected':''}}>Self-Defense</option>
                                    <option {{ ($sport_activity=='Tai Chi')?'selected':''}}>Tai Chi</option>
                                    <option {{ ($sport_activity=='Wrestling')?'selected':''}}>Wrestling</option>
                                </optgroup>
                                <option {{ ($sport_activity=='Massage Therapy')?'selected':''}}>Massage Therapy</option>
                                <option {{ ($sport_activity=='Nutrition')?'selected':''}}>Nutrition</option>
                                <option {{ ($sport_activity=='Paint Ball')?'selected':''}}>Paint Ball</option>
                                <option {{ ($sport_activity=='Physical Therapy')?'selected':''}}>Physical Therapy</option>
                                <option {{ ($sport_activity=='Pilates')?'selected':''}}>Pilates</option>
                                <option {{ ($sport_activity=='Rafting')?'selected':''}}>Rafting</option>
                                <option {{ ($sport_activity=='Rapelling')?'selected':''}}>Rapelling</option>
                                <option {{ ($sport_activity=='Rock Climbing')?'selected':''}}>Rock Climbing</option>
                                <option {{ ($sport_activity=='Rowing')?'selected':''}}>Rowing</option>
                                <option {{ ($sport_activity=='Running')?'selected':''}}>Running</option>
                                <optgroup label="Sightseeing Tours">
                                    <option {{ ($sport_activity=='Airplane Tour')?'selected':''}}>Airplane Tour</option>
                                    <option {{ ($sport_activity=='ATV Tours')?'selected':''}}>ATV Tours</option>
                                    <option {{ ($sport_activity=='Boat Tours')?'selected':''}}>Boat Tours</option>
                                    <option {{ ($sport_activity=='Bus Tour')?'selected':''}}>Bus Tour</option>
                                    <option {{ ($sport_activity=='Caving Tours')?'selected':''}}>Caving Tours</option>
                                    <option {{ ($sport_activity=='Helicopter Tour')?'selected':''}}>Helicopter Tour</option>
                                </optgroup>
                                <option {{ ($sport_activity=='Sailing')?'selected':''}}>Sailing</option>
                                <option {{ ($sport_activity=='Scuba Diving')?'selected':''}}>Scuba Diving</option>
                                <option {{ ($sport_activity=='Sky diving')?'selected':''}}>Sky diving</option>
                                <option {{ ($sport_activity=='Snow Skiing')?'selected':''}}>Snow Skiing</option>
                                <option {{ ($sport_activity=='Snowboarding')?'selected':''}}>Snowboarding</option>
                                <option {{ ($sport_activity=='Strength')?'selected':''}}>Strength &amp; Conditioning</option>
                                <option {{ ($sport_activity=='Surfing')?'selected':''}}>Surfing</option>
                                <option {{ ($sport_activity=='Swimming')?'selected':''}}>Swimming</option>
                                <option {{ ($sport_activity=='Tennis')?'selected':''}}>Tennis</option>
                                <option {{ ($sport_activity=='Tours')?'selected':''}}>Tours</option>
                                <option {{ ($sport_activity=='Vollyball')?'selected':''}}>Vollyball</option>
                                <option {{ ($sport_activity=='Weight training')?'selected':''}}>Weight training</option>
                                <option {{ ($sport_activity=='Windsurfing')?'selected':''}}>Windsurfing</option>
                                <option {{ ($sport_activity=='Yoga')?'selected':''}}>Yoga</option>
                                <option {{ ($sport_activity=='Zip-Line')?'selected':''}}>Zip-Line</option>
                                <option {{ ($sport_activity=='Zumba')?'selected':''}}>Zumba</option>
                            </select>
                            <select id="" name="" class="form-control activityselect2">
                                <option><?=$area?></option>
                            </select>
                            <div class="activityselect3 special-date">
                                <input type="text" name="service_date" id="service_date" placeholder="Date" class="form-control">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <script type="text/javascript">
                                $('#service_date').datepicker({
                                    todayHighlight: true,
                                    multidate: true
                                });
                                $(".fa-calendar").click(function () {
                                    $('#service_date').focus();
                                });
                            </script>
                            <select id="pguest" name="pguest" class="form-control activityselect4">
                                <option value="">Participant #</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>15</option>
                                <option>20</option>
                                <option>25</option>
                                <option>30</option>
                                <option>35</option>
                                <option>40</option>
                                <option>45</option>
                                <option>50</option>
                                <option>55</option>
                                <option>60</option>
                                <option>65</option>
                                <option>70</option>
                                <option>75</option>
                                <option>80</option>
                                <option>85</option>
                                <option>90</option>
                                <option>95</option>
                                <option>100</option>
                            </select>
                            <select id="" name="" class="form-control activityselect5">
                                <option value="">Service Type</option>
                                <?php 
                                if(isset($servicetype)) {
                                foreach($servicetype as $type) {
                                ?>
                                <option><?=$type?></option>
                                <?php }} ?>
                            </select>
                        </div>
                        <div class="kickshow-block">
                            <div class="topkick intro" id="kickboxing1">
                                <ul>
                                    <h5><span><?= $service['program_name'] ?></span></h5>
                                    <li><?=date('l jS \of F Y')?></li>
                                    <li><?= $service['mon_shift_start'] ?> - <?= $service['mon_shift_end'] ?></li>
                                    <li>Service: <?= $service['service_type'] ?></li>
                                    <li>Duration: <?= $service['mon_duration'] ?></li>
                                    <li>Activity Location: <?= $service['activity_location'] ?></li>
                                    <li>Spots Left: <s>2/50</s></li>
                                    <li>Great For: <?= $service['activity_for'] ?></li>
                                    <li>Age: <?= $service['age_range'] ?></li>
                                    <li>Language: <?=$languages?></li>
                                    <li>Skill Level: <?= $service['difficult_level'] ?></li>
                                </ul>
                                <div class="righthalf">
                                    <label>Choose Price Option</label>
                                    <p>Price Option: <?=$pay_session?> Session</p>
                                    <p>Participants: <?= $service['group_size'] ?></p>
                                    <p>Total: $<?=$pay_price?></p>
                                    <form method="post" action="/instant-hire?action=add&pid=<?= $service["id"]; ?>">
                                    @csrf
                                    <input type="hidden" class="product-quantity" name="quantity" value="1" size="2" />
                                    <input type="hidden" class="product-price" name="price" value="<?=$pay_price?>" size="2" />
                                    <input type="submit" value="Add to Cart" class="btn btn-addtocart" />
                                    <!--<a href="#" class="btn btn-addtocart" style="float:right;" data-toggle="modal" data-target="#successAddCart<?//=$companyid?>">Add to Cart1</a>-->
                                    </form>
                                </div>
                            </div>
                            <div class="bottomkick">
                                <div class="viewmore_links">
                                    <a id="viewmore1">View More <img src="{{ url('public/img/arrow-down.png') }}" alt=""></a>
                                    <a id="viewless1">View Less <img src="{{ url('public/img/arrow-down.png') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="kickshow-block" style="display:none">
                            <div class="topkick" id="kickboxing2">
                                <ul>
                                    <h5><span>MMA for Kids</span></h5>
                                    <li>Friday, May 7th, 2021</li>
                                    <li>10:00am - 10:30am</li>
                                    <li>Service: Group Class</li>
                                    <li>Duration: 30 min</li>
                                    <li>Activity Location: At Business</li>
                                    <li>Spots Left: 2/50</li>
                                    <li>Great For: Adults</li>
                                    <li>Age: 18+</li>
                                    <li>Language: English, Spanish</li>
                                    <li>Skill Level: All Levels</li>
                                </ul>
                                <div class="righthalf">
                                    <label>Choose Price Option</label>
                                    <select name="price" id="price2" multiple>
                                        <option value="0">Breathing Problem</option>
                                        <option value="1">Back Problem</option>
                                        <option value="2">Pregnant</option>
                                        <option value="3">Special Needs</option>
                                        <option value="4">Doesnt Matter</option>
                                        <option value="5">Others</option>
                                    </select>
                                    <script>
                                        var p = new SlimSelect({
                                            select: '#price2'
                                        });
                                    </script>
                                    <p>Price Option: None</p>
                                    <p>Participants: 0</p>
                                    <p>Total: 0</p>
                                    <a href="#" class="btn btn-addtocart" style="float:right;" data-toggle="modal" data-target="#successAddCart">Add to Cart</a>
                                </div>
                            </div>
                            <div class="bottomkick">
                                <div class="viewmore_links">
                                    <a id="viewmore2">View More <img src="{{ url('public/img/arrow-down.png') }}" alt=""></a>
                                    <a id="viewless2">View Less <img src="{{ url('public/img/arrow-down.png') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="kickshow-block" style="display:none">
                            <div class="topkick" id="kickboxing3">
                                <ul>
                                    <h5><span>Brazilian Jiu-Jitsu for Adults</span></h5>
                                    <li>Friday, May 7th, 2021</li>
                                    <li>8:00am - 10:00am</li>
                                    <li>Service: Group Class</li>
                                    <li>Duration: 3 hour</li>
                                    <li>Activity Location: At Business</li>
                                    <li>Spots Left: 2/50</li>
                                    <li>Great For: Adults</li>
                                    <li>Age: 18+</li>
                                    <li>Language: English, Spanish</li>
                                    <li>Skill Level: All Levels</li>
                                </ul>
                                <div class="righthalf">
                                    <label>Choose Price Option</label>
                                    <select name="price" id="price3" multiple>
                                        <option value="0">Breathing Problem</option>
                                        <option value="1">Back Problem</option>
                                        <option value="2">Pregnant</option>
                                        <option value="3">Special Needs</option>
                                        <option value="4">Doesnt Matter</option>
                                        <option value="5">Others</option>
                                    </select>
                                    <script>
                                        var p = new SlimSelect({
                                            select: '#price3'
                                        });
                                    </script>
                                    <p>Price Option: None</p>
                                    <p>Participants: 0</p>
                                    <p>Total: 0</p>
                                    <a href="#" class="btn btn-addtocart" style="float:right;" data-toggle="modal" data-target="#successAddCart">Add to Cart</a>
                                </div>
                            </div>
                            <div class="bottomkick">
                                <div class="viewmore_links">
                                    <a id="viewmore3">View More <img src="{{ url('public/img/arrow-down.png') }}" alt=""></a>
                                    <a id="viewless3">View Less <img src="{{ url('public/img/arrow-down.png') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>