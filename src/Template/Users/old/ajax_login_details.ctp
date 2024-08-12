<ul>
    <li>
        <label>Full  Name</label>
        <input type="text" disabled="disable" value="<?php echo $user_details->user_detail->first_name; ?> <?php echo $user_details->user_detail->last_name; ?>" />
    </li>
    
    
    <li>
        <label>Email</label>
        <input type="email" disabled="disable" value="<?php echo $this->request->session()->read('Auth.User.email'); ?>" />
    </li>
    <li>
        <label>Password</label>
        <input type="password" disabled="disable" value="********" />
    </li>
</ul>