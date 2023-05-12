<?php
ini_set('display_errors', true);
$host = "172.19.100.214";
$dbname = "network_api";
$username = "junior";
$password = "senha";
require dirname(dirname(__DIR__)).'/vendor/autoload.php';


try {
      $conn = new PDO("mysql:host=$host;port=3336;dbname=network_api", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Deu certo"."\n";
    } catch (PDOException $pe) {
      die ("Could not connect to the database $dbname :" . $pe->getMessage());
    }

    // for ($i=0; $i < 20; $i++) { 
    //     $faker = Faker\Factory::create('pt_BR');
    //     $stmt = $conn->prepare('INSERT INTO up_users (username, email, provider, password, created_at, confirmed, blocked,  
    //      address, number, complement, district, city, state, phone, birthday, marital_status, 
    //      batized, sex, alias_users) VALUES ( :username, :email, :provider,  :password,  :created_at, :confirmed, :blocked,         
    //      :address, :number, :complement, :district, :city, :state, :phone,  :birthday,  :marital_status,
    //      :batized, :sex, :alias_member)');
    //     $stmt->execute(array(
    //       ':username' => $faker->name,
    //       ':email' => $faker->email,
    //       ':provider' => 'local',
    //       ':password' => '$2a$10$TnYv1attIg64i9h.arRJIOBKAmJ8raIoYJALwCWL7RKVLbv/vi.De',
    //       ':created_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
    //       ':confirmed' => 1,
    //       ':blocked' => 0,
    //       ':address' => $faker->address,
    //       ':number' => $faker->randomDigit,
    //       ':complement' => $faker->word,
    //       ':district' => $faker->streetName,
    //       ':city' => $faker->city,
    //       ':state' => $faker->state,
    //       ':phone' => $faker->cellphone,
    //       ':birthday' => $faker->date($format = 'Y-m-d', $max = 'now'),
    //       ':marital_status' => 'Casado',
    //       ':batized' => $faker->numberBetween($min = 0, $max = 1),
    //       ':sex' => 'Masculino',
    //       ':alias_member' => $faker->name
    //     ));
    //    echo "Cadastrado.<br/>";
    // }

    //INSERINDO RELACIONAMENTO DE USUARIO COM PERFIL DE USUARIO
    // for ($i=2; $i < 23; $i++) { 
    //   $faker = Faker\Factory::create('pt_BR');      
    //   $stmt = $conn->prepare('INSERT INTO links_user_links (link_id, user_id) VALUES( :link_id, :user_id )');
    //   $stmt->execute(array(
    //     ':link_id' => 4,
    //     ':user_id' =>  $i
    //   ));
      
    //  echo "Cadastrado.<br/>";
    // }

    //INSERINDO RELACIONAMENTO DE USUARIO COM A INSTITUIÇÃO
    // for ($i=2; $i < 23; $i++) { 
    //   $faker = Faker\Factory::create('pt_BR');      
    //   $stmt = $conn->prepare('INSERT INTO institutions_user_links (institution_id, user_id) VALUES( :institution_id, :user_id )');
    //   $stmt->execute(array(
    //     ':institution_id' => $faker->numberBetween($min = 1, $max = 2),
    //     ':user_id' =>  $i
    //   ));
      
    //  echo "Relacionamento de instituição com usuario cadastrado com sucesso.<br/>";
    // }

    //INSERINDO RELACIONAMENTO DE USUARIO COM O GRUPO
    for ($i=2; $i < 5; $i++) { 
      $faker = Faker\Factory::create('pt_BR');      
      $stmt = $conn->prepare('INSERT INTO groups_user_links (group_id, user_id) VALUES( :group_id, :user_id )');
      $stmt->execute(array(
        ':group_id' => $faker->numberBetween($min = 1, $max = 2),
        ':user_id' =>  $i
      ));
      
      echo "Relacionamento de GRUPO com usuario cadastrado com sucesso.<br/>";
    }
?>