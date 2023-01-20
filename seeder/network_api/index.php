<?php
ini_set('display_errors', true);
$host = "172.22.0.2";
$dbname = "network_api";
$username = "junior";
$password = "senha";
require dirname(dirname(__DIR__)).'/vendor/autoload.php';


try {
    $conn = new PDO("mysql:host=172.21.203.66;dbname=network_api", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Deu certo";
    } catch (PDOException $pe) {
    die ("Could not connect to the database $dbname :" . $pe->getMessage());
    }

    for ($i=0; $i < 2; $i++) { 
        $faker = Faker\Factory::create('pt_BR');
        $stmt = $conn->prepare('INSERT INTO up_users (username, email, provider, password, confirmed,
        created_at, address, number, complement, district, city, state, phone, birthday, 
        marital_status,batized, sex) VALUES(:username, :email, :provider, :password, :confirmed, 
        :created_at, :address, :number, :complement, :district, :city, :state, :phone, 
        :birthday, :marital_status,:batized, :sex)');
        $stmt->execute(array(
          ':username' => $faker->name,
          ':email' => $faker->email,
          ':provider' => 'local',
          ':password' => '$2a$10$TnYv1attIg64i9h.arRJIOBKAmJ8raIoYJALwCWL7RKVLbv/vi.De',
          ':confirmed' => $faker->numberBetween($min = 0, $max = 1),
          ':created_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
          ':address' => $faker->address,
          ':number' => $faker->randomDigit,
          ':complement' => $faker->word,
          ':district' => $faker->streetName,
          ':city' => $faker->city,
          ':state' => $faker->state,
          ':phone' => $faker->cellphone,
          ':birthday' => $faker->date($format = 'Y-m-d', $max = 'now'),
          ':marital_status' => null,
          ':batized' => $faker->numberBetween($min = 0, $max = 1),
          ':sex' => 'Masculino'
        ));
       echo "Cadastrado.<br/>";
    }
?>