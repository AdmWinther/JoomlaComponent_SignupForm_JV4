<?php
use Joomla\CMS\Factory;
/**
 * @package     Joomla.Site
 * @subpackage  com_awinsignupform
 *
 * @copyright   Copyright (C) 2020 Adam Winther. All rights reserved.
 * @license     GNU General Public License version 3; see LICENSE
 */

 // No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<div class="row justify-content-center">
    <!-- <form class="col-lg-4" action="http://localhost/joomla5/index.php?option=com_awinsignupform&task=awin.submit" method="post" name="signupForm" id="signupForm">  -->
    <form class="col-lg-4" action="https://www.awin.dk/index.php?option=com_awinsignupform&task=awin.submit" method="post" name="signupForm" id="signupForm"> 
        <h2>Sign Up Form</h2>

        <label class="required form-label invalid" for="firstName" id="firstNameLabel">First Name:</label>
        <input type="text" name="firstName" id="firstName" required value="<?php echo htmlspecialchars($this->formData['firstName'] ?? '', ENT_QUOTES); ?>">
        </br>

        <label class="required form-label invalid" for="lastName" id="lastNameLabel">Last Name:</label>
        <input type="text" name="lastName" id="lastName" required value="<?php echo htmlspecialchars($this->formData['lastName'] ?? '', ENT_QUOTES); ?>">
        </br>

        <label class="required form-label invalid" for="emailAddress" id="emailAddressLabel">Email Address:</label>
        <input type="text" name="emailAddress" id="emailAddress" required value="<?php echo htmlspecialchars($this->formData['emailAddress'] ?? '', ENT_QUOTES); ?>">
        </br>

        <label class="required form-label invalid" for="password" id="passwordLabel">Password:</label>
        <input type="password" name="password" id="password" required>
        </br>

        <button class="btn btn-primary btn-lg w-100" type="submit">Send</button>

        <!-- Always include form.token to protect against CSRF.-->
        <p><?php echo JHtml::_('form.token'); ?></p>
        <?php echo JHtml::_('form.token'); ?>
        <?php foreach (Factory::getApplication()->getMessageQueue() as $message): ?>
            <div class="alert alert-<?php echo $message['type']; ?>">
                <?php echo $message['message']; ?>
            </div>
        <?php endforeach; ?>


    </form>
</div>