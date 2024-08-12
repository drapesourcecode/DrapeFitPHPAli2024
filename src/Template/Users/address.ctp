<?= $this->Flash->render() ?>
<script type="text/javascript">
$("#last-para2").bind("click",(function(){alert("Button 2 is clicked!");$("#button1").trigger("click");}));
</script>
<section class="customer-details">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li>
                        <span>s</span>
                        <a href="#">Sukendu</a>
                    </li>
                    <li><a href="#">FIT PROFILE </a></li>
                    <li><a href="#">ORDERS </a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="check-out-address-details">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="Address-details">
                    <form>
                        <ul>
                            <li><strong>Debasish Das</strong></li>
                            <li>At/Po-Barbatia Bazar ,Dist-Balasore,Odisha, India</li>
                            <li>BHUBANESWAR, ODISHA 751010</li>
                            <li>India</li>
                            <li>Phone: 9776380822</li>
                        </ul>
                        <button type="button" class="btn">Deliver to this Address</button>
                        <a href="#">Delete</a>
                        <a href="#">Edit</a>
                    </form>
                </div>
                <div class="Address-details">
                    <form>
                        <ul>
                            <li><strong>Debasish Das</strong></li>
                            <li>At/Po-Barbatia Bazar ,Dist-Balasore,Odisha, India</li>
                            <li>BHUBANESWAR, ODISHA 751010</li>
                            <li>India</li>
                            <li>Phone: 9776380822</li>
                        </ul>
                        <button type="button" class="btn">Deliver to this Address</button>
                        <a href="#">Delete</a>
                        <a href="#">Edit</a>
                    </form>
                </div>	
                <div class="Address-details">
                    <form>
                        <ul>
                            <li><strong>Debasish Das</strong></li>
                            <li>sAt/po-Barbatia Bazar ,Dist-Balasore,Odisha, India</li>
                            <li>BHUBANESWAR, ODISHA 751010</li>
                            <li>India</li>
                            <li>Phone: 9776380822</li>
                        </ul>
                        <button type="button" class="btn">Deliver to this Address</button>
                        <a href="#">Delete</a>
                        <a href="#">Edit</a>
                    </form>
                </div>							
            </div>
        </div>
    </div>
</section>
<section class="check-out-address">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form class="check-out-address-form">
                    <h3>Add a new address</h3>
                    <ul>
                        <li>
                            <label>Full name : </label>
                            <input type="text" name="" maxlength="50">
                        </li>
                        <li>
                            <label>Address line 1 : </label>
                            <input type="text" name=""maxlength="60">
                        </li>
                        <li>
                            <label>Address line 2 : </label>
                            <input type="text" name="" maxlength="60">
                        </li>
                        <li>
                            <label>City : </label>
                            <input type="text" name="" maxlength="50">
                        </li>
                        <li>
                            <label>State/Province/Region : </label>
                            <input type="text" name="" maxlength="50">
                        </li>
                        <li>
                            <label>ZIP : </label>
                            <input type="text" name="" maxlength="20">
                        </li>
                        <li>
                            <label>Country/Region : </label>
                            <select>
                                <option></option>
                            </select>
                        </li>
                        <li>
                            <label>Phone number:</label>
                            <input type="text" name="" maxlength="20">
                        </li>
                    </ul>
                    <button type="button" class="btn deliver-address">Deliver to this Address</button>
                </form>
            </div>
            <script>
                function delivery() {
                    var x = document.getElementById("delivery-day");
                    if (x.style.display === "block")
                    {
                        x.style.display = "none";
                    } else
                    {
                        x.style.display = "block";
                    }
                }
            </script>
        </div>
    </div>
</section>