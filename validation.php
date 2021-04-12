global $valid;
global $val_messages;

function register_user()
{

global $pdo;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$result = true;
// GO THROUGH AND BIND EACH VALUE

if (isset($_POST['email']) && isset($_POST['psw']) && isset($_POST['psw-repeat'])) {
foreach ($_POST as $type => $value) {

if ($type == 'email') {

$submitted = $_POST["email"];
$pattern = '#^(.+)@([^\.].*)\.([a-z]{2,})$#';

$this_result = preg_match($pattern, $submitted);

$result = $result && $this_result;

//Update message
if ($this_result == true) {
$val_messages[$type] = "";
} else {
$val_messages[$type] = "email is not correct format";
}
} else if ($type == "psw") {

$submitted = $_POST["psw"];

$pattern = '^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$';

$this_result = preg_match($pattern, $submitted);

$result = $result && $this_result;

//Update message
if ($this_result == true) {
$val_messages[$type] = "";
} else {
$val_messages[$type] = "please enter a password with a minimum eight characters, at least one letter and one number";
}
}
} // end of loop through POST
// check password is matching repeat password
if ($_POST['psw'] === $_POST['psw-repeat']) {
$this_result = true;

$result = $result && $this_result;
} else {
$val_messages['$psw-repeat'] = "Passwords do not match";
$this_result = false;
$result = $result && $this_result;
}
if ($result = true) {
//PREPARED statement
$sql = 'INSERT INTO users (email, psw) VALUES (:email, :psw)';

$statement = $pdo->prepare($sql);

$statement->bindValue(':email', $_POST['email']);
$statement->bindValue(':psw', $_POST['psw']);

$statement->execute();
}
}
}
}// end submit post

// Display error message if field not valid. Displays nothing if the field is valid.
function the_validation_message($type) {

global $val_messages;

// Start bu checking if the re
if($_SERVER['REQUEST_METHOD']== 'POST')
{
// check if the $val_messages[ ] array has a message set for a type
if($val_messages[$type] != "") {
echo "<strong>" . $val_messages[$type] . "</strong>";
}
}
}