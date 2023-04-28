 <?php
// // Configuración de la base de datos
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "login_db";

// // Conexión a la base de datos
// $conn = mysqli_connect($servername, $username, $password, $dbname);

// // Verificación de la conexión
// if (!$conn) {
//     die("Error de conexión: " . mysqli_connect_error());
// }

// // Obtención de los valores del formulario
// $email = $_POST['email'];
// $password = $_POST['password'];

// // Consulta SQL
// $sql = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password'";

// // Ejecución de la consulta
// $result = mysqli_query($conn, $sql);

// // Verificación del resultado de la consulta
// if (mysqli_num_rows($result) > 0) {
//     echo "Inicio de sesión exitoso!";
// } else {
//     echo "Error en el inicio de sesión. Verifica tus credenciales.";
// }

// // Cierre de la conexión
// mysqli_close($conn);
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data from form
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
$stmt->bind_param("ss", $email, $password);

// Execute SQL statement
if ($stmt->execute()) {
  echo header("Location: https://famous-frangipane-93e8ed.netlify.app");
  exit;;
} else {
  echo "Error: " . $stmt->error;
}

// Close connection
$conn->close();
?>

