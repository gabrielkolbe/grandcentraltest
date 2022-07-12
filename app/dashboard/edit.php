<div class="row">
    <aside class="column">
        <div class="side-nav">
            <a href="/siteemails" class="btn btn-primary float-right">List Site Emails</a>        </div>
    </aside>
    <div class="col-md-12">
        <div class="siteemails form content">
            <form method="post" accept-charset="utf-8" action="/siteemails/edit/3">
            <div style="display:none;"><input type="hidden" name="_method" value="PUT"/>
           <input type="hidden" name="csrf_token" value="<?php echo generate_token();?>" />
            </div>            <fieldset>
                <h1>Edit Site Email</h1>
                <div class="input text required"><label for="subject">Subject</label><input type="text" name="subject" class="form-control" required="required" data-validity-message="This field cannot be left empty" oninvalid="this.setCustomValidity(&#039;&#039;); if (!this.value) this.setCustomValidity(this.dataset.validityMessage)" oninput="this.setCustomValidity(&#039;&#039;)" id="subject" value="Please reset your password" maxlength="100"/></div><BR><p>Dynamic Values in the Content</p>NAME,RESET_LINK<BR><BR><div class="input textarea required"><textarea name="body" class="form-controlr" id="text-editor" required="required" data-validity-message="This field cannot be left empty" oninvalid="this.setCustomValidity(&#039;&#039;); if (!this.value) this.setCustomValidity(this.dataset.validityMessage)" oninput="this.setCustomValidity(&#039;&#039;)" rows="5">&lt;BR&gt;
&lt;p&gt;Hello {{NAME}},&lt;/p&gt;
&lt;BR&gt;
&lt;p&gt;You are receiving this email because a password reset has been requested for your account. Please click the link below to select your new password.&lt;/p&gt;
&lt;BR&gt;
&lt;p&gt;{{RESET_LINK}}&lt;/p&gt;
&lt;BR&gt;
&lt;p&gt;Your password link will work for 48 hours.&lt;BR&gt;If you did not request to change your password, please ignore this email.&lt;/p&gt;
&lt;BR&gt;
&lt;p&gt;Best Regards&lt;/p&gt;
&lt;BR&gt;
</textarea></div>            </fieldset>
            <button class="btn btn-primary float-right" type="submit">Submit</button>            </form>        </div>
    </div>
</div>