<?php
class Elementor_Hello_World_Widget_1 extends \Elementor\Widget_Base {

public function get_name() {
    return 'hello_world_widget_1';
}

public function get_title() {
    return esc_html__('Hello World 1', 'elementor-addon');
}

public function get_icon() {
    return 'eicon-code';
}

public function get_categories() {
    return ['basic'];
}

protected function render() {
    ?>
    <div id="custom-widget">
        <?php
        if (is_user_logged_in()) {
            // Display a welcome message or user-specific content for logged-in users.
            $current_user = wp_get_current_user();
            echo 'Welcome, ' . esc_html($current_user->display_name) . '!';
        } else {
            // Display a login form.
            ?>
            <h2>Login</h2>
            <form id="login-form">
                <input type="text" id="login-username" name="login-username" placeholder="Username" required>
                <input type="password" id="login-password" name="login-password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>

            <!-- Display a registration form -->
            <h2>Register</h2>
            <form id="register-form">
                <input type="text" id="register-username" name="register-username" placeholder="Username" required>
                <input type="password" id="register-password" name="register-password" placeholder="Password" required>
                <button type="submit">Register</button>
            </form>
            <?php
        }
        ?>
    </div>
    <script>
        // Add JavaScript or AJAX functionality here to handle form submission
        // and user registration/login.
        // You may need to use jQuery or another library for AJAX requests.

        // Check if the user is already logged in and hide the login and registration forms.
        <?php if (is_user_logged_in()) : ?>
            jQuery("#login-form, #register-form").hide();
        <?php else : ?>
            // Handle login form submission using AJAX.
            jQuery("#login-form").on("submit", function (e) {
                e.preventDefault();
                var loginData = jQuery(this).serialize();
                // Perform an AJAX request to handle user login.
                jQuery.ajax({
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    method: 'POST',
                    data: {
                        action: 'custom_widget_handle_login', // Create a WordPress AJAX action for handling login
                        loginData: loginData
                    },
                    success: function (response) {
                        // Handle the response from the server, e.g., display a success message or error message.
                        alert(response.message);
                    }
                });
            });

            // Handle registration form submission using AJAX.
            jQuery("#register-form").on("submit", function (e) {
                e.preventDefault();
                var registerData = jQuery(this).serialize();
                // Perform an AJAX request to handle user registration.
                jQuery.ajax({
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    method: 'POST',
                    data: {
                        action: 'custom_widget_handle_registration', // Create a WordPress AJAX action for handling registration
                        registerData: registerData
                    },
                    success: function (response) {
                        // Handle the response from the server, e.g., display a success message or error message.
                        alert(response.message);
                    }
                });
            });
        <?php endif; ?>
    </script>
    <?php
}
}

// Add an action for handling login form submission.
add_action('wp_ajax_custom_widget_handle_login', 'custom_widget_handle_login');
add_action('wp_ajax_nopriv_custom_widget_handle_login', 'custom_widget_handle_login');

// Add an action for handling registration form submission.
add_action('wp_ajax_custom_widget_handle_registration', 'custom_widget_handle_registration');
add_action('wp_ajax_nopriv_custom_widget_handle_registration', 'custom_widget_handle_registration');

function custom_widget_handle_login() {
// Handle user login here.
// You can access form data using $_POST['loginData'].

// Example: Attempt to log in the user.
$username = sanitize_text_field($_POST['loginData']['login-username']);
$password = sanitize_text_field($_POST['loginData']['login-password']);
$creds = array(
    'user_login'    => $username,
    'user_password' => $password,
    'remember'      => true
);

$user = wp_signon($creds, false);

if (is_wp_error($user)) {
    // Handle login error.
    $response = array('success' => false, 'message' => 'Login failed.');
} else {
    // User logged in successfully.
    $response = array('success' => true, 'message' => 'Login successful.');
}

echo json_encode($response);
// Make sure to exit after handling the AJAX request.
wp_die();
}

function custom_widget_handle_registration() {
// Handle user registration here.
// You can access form data using $_POST['registerData'].

// Example: Register a new user.
$username = sanitize_text_field($_POST['registerData']['register-username']);
$password = sanitize_text_field($_POST['registerData']['register-password']);

$user_id = wp_create_user($username, $password);

if (is_wp_error($user_id)) {
    // Handle registration error.
    $response = array('success' => false, 'message' => 'Registration failed.');
} else {
    // Registration successful.
    $response = array('success' => true, 'message' => 'Registration successful. You can now login.');
}

echo json_encode($response);
// Make sure to exit after handling the AJAX request.
wp_die();
}
