function PhoneNumberValidation()
{
	var phoneNumber = document.getElementById("txtPhoneNumber").value;
	
	if (phoneNumber.match(/^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/))
	{
		document.getElementById("txtPhoneNumber").style.color = "green";
		return true;
	}
	else
	{
		document.getElementById("txtPhoneNumber").style.color = "red";
		return false;
	}
}
function PostalCodeValidation()
{
	var postalCode = document.getElementById("txtPostalCode").value;
	
	if (postalCode.match(/^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/))
	{
		document.getElementById("txtPostalCode").style.color = "green";
		return true;
	}
	else
	{
		document.getElementById("txtPostalCode").style.color = "red";
		return false;
	}
}
function FormValidation()
{
	var nmdShoe = document.getElementById("nmdShoe");
	var tubularShoe = document.getElementById("tubularShoe");
	var yeezyShoe = document.getElementById("yeezyShoe");
	
	var firstName = document.getElementById("txtFirstName").value;
	var lastName = document.getElementById("txtLastName").value;
	var address = document.getElementById("txtAddress").value;
	var city = document.getElementById("txtCity").value;
	var province = document.getElementById("txtProvince").value;
	
	var itemSelected = false;
	var validFirstName = false;
	var validLastName = false;
	var validAddress = false;
	var validCity = false;
	var validProvince = false;

	document.getElementById("errors").innerHTML = "";
	
	if (!nmdShoe.checked && !tubularShoe.checked && !yeezyShoe.checked)
	{
		document.getElementById("errors").innerHTML += "select a product<br>";
	}
	else
	{
		itemSelected = true;
	}
	if (firstName == "" || firstName == null)
	{
		document.getElementById("errors").innerHTML += "first name<br>";
	}
	else
	{
		validFirstName = true;
	}
	if (lastName == "" || lastName == null)
	{
		document.getElementById("errors").innerHTML += "last name<br>";
	}
	else
	{
		validLastName = true;
	}
	if (address == "" || address == null)
	{
		document.getElementById("errors").innerHTML += "address<br>";
	}
	else
	{
		validAddress = true;
	}
	if (city == "" || city == null)
	{
		document.getElementById("errors").innerHTML += "city<br>";
	}
	else
	{
		validCity = true;
	}
	if (province == "" || province == null)
	{
		document.getElementById("errors").innerHTML += "province<br>";
	}
	else
	{
		validProvince = true;
	}
	if (!PostalCodeValidation())
	{
		document.getElementById("errors").innerHTML += "postal<br>";
	}
	if (!PhoneNumberValidation())
	{
		document.getElementById("errors").innerHTML += "phone<br>";
	}
	if (PostalCodeValidation() && PhoneNumberValidation() && itemSelected && 
	validFirstName && validLastName && validAddress && validCity && validProvince)
	{
		document.orderForm.submit();
	}
}