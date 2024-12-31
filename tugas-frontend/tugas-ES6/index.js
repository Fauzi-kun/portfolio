//soal 1
const luas = (panjang, lebar) => {
  return panjang * lebar;
};
console.log(luas(2, 3));

//soal 2
const newfunction = (firstname, lastname) => {
  const fullname = { firstname, lastname };
  console.log(fullname);
};
//Driver Code
newfunction("William", "Imoh");

//soal 3
const newObject = {
  firstName: "Muhammad",
  lastName: "Iqbal Mubarok",
  address: "Jalan Ranamanyar",
  hobby: "playing football",
};
const { firstName, lastName, address, hobby } = newObject;
// Driver code
console.log(firstName, lastName, address, hobby);

//soal 4
const west = ["Will", "Chris", "Sam", "Holly"];
const east = ["Gill", "Brian", "Noel", "Maggie"];
const combined = [...west, ...east];
//Driver Code
console.log(combined);

//soal 5
const planet = "earth";
const view = "glass";
let before = `Lorem ${view} dolor sit amet, consectetur adipiscing elit, ${planet}`;
console.log(before);
