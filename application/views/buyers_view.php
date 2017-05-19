<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/navigation.php'; ?>

<!-- Main page row -->
<div class="row row-fluid">
    <?php require_once 'includes/jackie-sidebar.php'; ?>

    <!-- Header -->
    <div class="col-md-8 col-md-pull-4">
        <div class="row">
            <h1><i>Frequently Asked Questions<br /> for <b>Buyers</b></i></h1>
            <hr />

            <!-- 6 Reasons Collapsable Panel -->
            <div class="panel-group">
                <div class="panel panel-default">
                    <a data-toggle="collapse" href="#collapse1">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                6 Reasons to use a Realtor&#174;<span class="glyphicon glyphicon-plus float-right hidden-xs"></span>
                            </h4>
                        </div>
                    </a>
                    <div id="collapse1" class="panel-collapse collapse">
                        <div class="panel-body">
                            <blockquote>
                                <ol>
                                    <li>They have loads of expertise</li>
                                    <li>They have turbocharged searching power</li>
                                    <li>They have bullish negotiating chops</li>
                                    <li>They're connected to everyone</li>
                                    <li>They adhere to a strict code of ethics</li>
                                    <li>They're your sage parent/data-analyst/therapist - all rolled into one</li>
                                </ol>
                                <small><cite>Rachel Stults - Realtor.com - <a href="http://www.realtor.com/advice/buy/why-you-should-use-realtor" target="_blank">original article</a></cite></small>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Agent/broker/realtor difference -->
            <div class="panel-group">
                <div class="panel panel-default">
                    <a data-toggle="collapse" href="#collapse2">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                Difference Between <i>Agent, Broker &amp; Realtor&#174;</i><span class="glyphicon glyphicon-plus float-right hidden-xs"></span>
                            </h4>
                        </div>
                    </a>
                    <div id="collapse2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <blockquote>
                                <h4><b>Real Estate Agent:</b></h4>
                                <p>Anyone who earns a real estate license can be called an <i>agent</i>. State requirements vary, but in all states you must take a minimum number of classes and pass a test to earn your license.</p>
                                <hr />
                                <h4><b>REALTOR&#174;</b></h4>
                                <p>A real estate agent who is a member of the National Association of REALTORS&#174;, which means that he or she must uphold the standards of the association and its code of ethics.</p>
                                <hr />
                                <h4><b>Real Estate Broker</b></h4>
                                <p>A person who has taken education beyond the agent level as required by state laws and has passed a broker's license exam. Brokers can work alone or they can hire agents to work for them.</p>
                                <small><cite>Michele Lerner - Realtor.com - <a href="http://www.realtor.com/advice/buy/whats-difference-real-estate-salesperson-broker/" target="_blank">original article</a></cite></small>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>

            <!-- What to Look For -->
            <div class="panel-group">
                <div class="panel panel-default">
                    <a data-toggle="collapse" href="#collapse3">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                What to Look For in a Home<span class="glyphicon glyphicon-plus float-right hidden-xs"></span>
                            </h4>
                        </div>
                    </a>
                    <div id="collapse3" class="panel-collapse collapse">
                        <div class="panel-body">
                            <h4><b>What to Look For in a Home</b></h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ornare pellentesque metus, id malesuada nunc ultrices at. Aliquam id nulla non lorem hendrerit elementum a vitae sem. Praesent accumsan ornare erat, ac convallis lacus facilisis quis. Morbi vitae est turpis. Integer purus magna, ornare vel egestas sed, porta id orci. Sed a felis in libero fermentum mollis in in odio. Vestibulum vehicula ante eros, quis ornare nunc eleifend ut. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur luctus cursus interdum. </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Choosing a Neighborhood -->
            <div class="panel-group">
                <div class="panel panel-default">
                    <a data-toggle="collapse" href="#collapse4">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                Choosing a Neighborhood in Columbus<span class="glyphicon glyphicon-plus float-right hidden-xs"></span>
                            </h4>
                        </div>
                    </a>
                    <div id="collapse4" class="panel-collapse collapse">
                        <div class="panel-body">
                            <h4><b>Choosing a Neighborhood in Columbus</b></h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ornare pellentesque metus, id malesuada nunc ultrices at. Aliquam id nulla non lorem hendrerit elementum a vitae sem. Praesent accumsan ornare erat, ac convallis lacus facilisis quis. Morbi vitae est turpis. Integer purus magna, ornare vel egestas sed, porta id orci. Sed a felis in libero fermentum mollis in in odio. Vestibulum vehicula ante eros, quis ornare nunc eleifend ut. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur luctus cursus interdum. </p>
                            <img src="<?= base_url('img/columbus-map.jpg') ?>" alt="Map of Columbus" class="img-responsive center-image" />
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div> <!-- /.row -->

<?php require_once 'includes/footer.php'; ?>