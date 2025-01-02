import { postData, loginData, addStudent } from "./lib/postData";
const arg = process.argv;

const command = arg[2];
const inputData = arg[3];

switch (command) {
  case "register":
    postData(inputData);
    break;
  case "login":
    loginData(inputData);
    break;
  case "addSiswa":
    addStudent(inputData);
    break;
  default:
    break;
}
