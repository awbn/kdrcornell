<h2>&Kappa;&Delta;&Rho; Beta Chapter Centennial Celebration</h2>
<p class="big grey">Celebrating 100 years of brotherhood</p>
<hr />

<div class="row">
    <?php
    // Display if any form errors
    if ($errors){
        echo "<div class='alert alert-error span12'>Some errors were encountered:<ul>";
        foreach($errors as $msg){
            printf("<li>%s</li>", $msg);
        }
        echo "</ul></div>";
    }
    ?>

    <div class="span12 copy">
        <p>The Beta Chapter celebrates its 100th anniversary in 2013. We invite all brothers and their guests back to celebrate 100 years of fraternity.</p>

        <h4>Event Information</h4>
        <p>
            <em>Friday, March 22</em><br>
            Afternoon: Gather at the Fraternity to meet and reminisce with brothers old and young<br>
            6pm: Dinner with Phil at Beta Chapter. It's going to be crowded, but we'll find a way to make it work. Please RSVP in advance<br>   
            After dinner: Relax into the evening with brothers and friends
        </p>
        <p>
            <em>Saturday, March 23</em><br>
            12pm: Corporation Board Meeting<br>
            1pm: Chapter Strategy Session - Past, Present, and Future<br>
            6pm: Reception at the Statler Hotel<br>
            7pm: Smooth Dinner: A Look Back on 100 Years<br>
            <a href="/files/CentennialMenu.pdf"><em>View Dinner Menu</em></a>
        </p>
        <p>
            <em>Sunday, March 24</em><br>   
            9:30am: Send-off brunch at the house
        </p>
        
        <h4>Statler Hotel Rooms</h4>
        <p>We have reserved a modest number of rooms with the Statler Hotel for this event under "KDRBC". They are $175 per night, and are reserved until February 20th. Please call 1-800-541-2501 to reserve a room today.</p>

        <h4>Smooth Dinner Ticker Prices</h4>
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Class Year</th>
              <th>Price (Per Person)</th>
            </tr>
          </thead>
          <tbody>
            <?php
                foreach($prices as $price)
                {
                    printf("<tr><td>%s</td><td>%s</td><tr>", $price["label"], $price["price"]);
                }
            ?>
          </tbody>
        </table>

        <h4>RSVP for the Weekend</h4>
        <p>Please RSVP below indicating your attendance for the weekend and the Saturday Smooth Dinner. Tickets will be purchased on the next page.</p>
        <div class="inlineform">
        <div class="form">
            <form class="form-horizontal" action="<?php echo $form_action; ?>" method="post">
                <div class="control-group">
                    <label class="control-label" for="name">Name</label>
                    <div class="controls">
                        <input type="text" name="name" id="name">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="year">Year</label>
                    <div class="controls">
                        <input type="text" id="year" name="year" minlength="4" size="4">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="email">Email</label>
                    <div class="controls">
                        <input type="text" id="email" name="email">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="phone">Phone</label>
                    <div class="controls">
                        <input type="text" id="phone" name="phone">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="address1">Address</label>
                    <div class="controls">
                        <input type="text" id="address1" name="address1">
                        <input type="text" id="address2" name="address2">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="city">City</label>
                    <div class="controls">
                        <input type="text" id="city" name="city">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="state">State</label>
                    <div class="controls">
                        <input type="text" id="state" name="state">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="zip">Zip</label>
                    <div class="controls">
                        <input type="text" id="zip" name="zip">
                    </div>
                </div>

                <div class="control-group control-wide">
                    <label class="control-label" for="fri_attend">I plan on addending dinner with Phil on Friday</label>
                    <div class="controls">
                        <input type="checkbox" id="fri_attend" name="fri_attend" checked value="Yes">
                    </div>
                </div>

                <div class="control-group control-wide">
                    <label class="control-label" for="fri_guests">I will be bringing additional guests on Friday</label>
                    <div class="controls">
                        <input type="text" id="fri_guests" name="fri_guests" value="0">
                    </div>
                </div>

                <div class="control-group control-wide">
                    <label class="control-label" for="sat_attend">I plan on addending the Saturday Smooth Dinner</label>
                    <div class="controls">
                        <input type="checkbox" id="sat_attend" checked name="sat_attend" value="Yes">
                    </div>
                </div>

                <div class="control-group control-wide">
                    <label class="control-label" for="sat_guests">I will be bringing additional guests on Saturday</label>
                    <div class="controls">
                        <input type="text" id="sat_guests" name="sat_guests" value="0">
                    </div>
                </div>

                <div class="control-group control-wide">
                    <label class="control-label" for="extra_funds">In the event that a surplus is created from ticket sales, I would like the surplus to be spent on</label>
                    <div class="controls">
                        <select name="extra_funds" id="extra_funds">
                            <option value="general_fund">General Fund</option>
                            <option value="scholarship">Scholarship</option>
                            <option value="house">House and Grounds</option>
                            <option value="rush">Rush</option>
                        </select>  
                    </div>
                </div>

                <div class="control-group control-wide">
                    <label class="control-label" for="share">Allow others to see that I have RSVP'd<br><em>(We'll only share name and class year)</em></label>
                    <div class="controls">
                        <input type="checkbox" id="share" checked name="share" value="Yes">
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn">Submit &raquo;</button>
                </div>
            </form>
            <p>You will receive a confirmation of your RSVP by e-mail.</p>
        </div>
    </div>

        <h4>Want to know who else is going?</h4>
        <p>See <a href="<?php echo $attending_link?>">who else has RSVP'd</a> and will be headed to Ithaca in March. Want to have a more interactive discussion? Check out the <a href="<?php echo $facebook_link?>">Facebook event page</a>.</p>

        <h4>Questions?</h4>
        <p>Please direct all questions to <a href="mailto:board@kdrcornell.com">board@kdrcornell.com</a>.</p>
    </div>
</div>