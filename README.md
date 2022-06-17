
# Flash_Library

- This is my online books platfrom.

- To avoid repetition I created conection.php and function.php files and I include them whenever I need to connect to my databse or check if am already connected or not.
- Same thing for Header.html and footer.html and Menu.html
- I used Vanilla JavaScript to increment the cart when clicking on a book on products.php page
## Owner

- [@Abdessamad Sayhi](https://github.com/Abdessamad-Sh)


## Features

- Easy Login/Logout and Signup interface
- Well organized design
- At products.php page when you click at a book the cart is encremented by 1 (I am not done yet !)


## Screenshots

![signupPHP](https://user-images.githubusercontent.com/78956474/174309395-096fab80-4f1d-4013-821b-4192ef434f24.PNG)
![loginphp](https://user-images.githubusercontent.com/78956474/174310530-4336a143-99b7-4fec-ae64-862d10f9a572.PNG)
![featuredbooksINDEX](https://user-images.githubusercontent.com/78956474/174309286-85521fd8-eacc-499b-b491-55e8a18f98b9.PNG)
![MENU](https://user-images.githubusercontent.com/78956474/174309265-3b679ac1-3ee4-478e-ae45-a4a86ed2c98d.PNG)
![books](https://user-images.githubusercontent.com/78956474/174309126-9695d4e9-9ac7-4875-b152-42f14b5ee460.PNG)
![addbook](https://user-images.githubusercontent.com/78956474/174309064-df8e1eaf-9b71-4644-9ac4-eb81acecce68.PNG)
![contactinfoINDEX_FOOTER](https://user-images.githubusercontent.com/78956474/174309280-d5c4a7e9-701b-455e-ad39-9e5363503803.PNG)
![footer2](https://user-images.githubusercontent.com/78956474/174309113-d7f1bbe6-bea7-4b30-ac1a-e8121cdc2f47.PNG)


## Usage/Examples

Check if the visitor is already loged-in

    function check_login($cnx)
    {
        if(isset($_SESSION['id']))
        {
            $id = $_SESSION['id'];
            $query = "select * from users where id = '$id' limit 1";

            $result = mysqli_query($cnx,$query);
            if($result and mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
            }
        }
    }

## Logout script

    session_start();

    if(isset($_SESSION['id'])){
        unset($_SESSION['id']);
    }
    header("Location: login/login.php");    

## Uploading books script

    session_start();
	
	include("login/connection.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$book_title     = $_POST['title'];
		$book_price     = $_POST['price'];
		$book_author    = $_POST['author'];
		$book_desc      = $_POST['description'];
		$image	        = $_FILES['image'];
		$image_loc      = $_FILES['image']['tmp_name'];
		$image_name     = $_FILES['image']['name'];
		$image_up       = "images/".$image_name;
		$insert         = "INSERT INTO books (title, author, image, price, description) VALUES ('$book_title', '$book_author', '$image_up', '$book_price', '$book_desc')";
		$result         = mysqli_query($cnx, $insert);
		if(move_uploaded_file($image_loc, 'images/'.$image_name))
		{
			header("Location: products.php");
		}else
		{
			echo "<script>alert('Troubleshooting errors while uploading an image to the Library')</script>";
		}
	}
