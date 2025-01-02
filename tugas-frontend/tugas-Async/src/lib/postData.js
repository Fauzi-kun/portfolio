import { readFile, writeFile } from "node:fs";
import fsPromises from "fs/promises";
import "core-js/stable";

const path = "data.json";

export const postData = (inputData) => {
  const [inputName, inputPassword, inputRole] = inputData.split(",");
  readFile(path, (err, data) => {
    if (err) {
      console.log(err);
    }
    let dataJson = JSON.parse(data);

    dataJson.push({
      name: inputName,
      password: inputPassword,
      role: inputRole,
      isLogin: false,
    });
    writeFile(path, JSON.stringify(dataJson), (err) => {
      if (err) {
        console.log(err);
      }
      console.log("Berhasil register");
    });
  });
};

export const loginData = (inputData) => {
  const [inputName, inputPassword] = inputData.split(",");
  fsPromises.readFile(path).then((data) => {
    let dataJson = JSON.parse(data);

    let indexPost = dataJson.findIndex((item) => item.name === inputName);

    let objectPost = dataJson[indexPost];

    if (objectPost.password == inputPassword) {
      objectPost.isLogin = true;

      dataJson.splice(indexPost, 1, objectPost);
      console.log("Berhasil login");

      return fsPromises.writeFile(path, JSON.stringify(dataJson));
    }
  });
};

export const addStudent = async (inputData) => {
  const [inputName, inputTrainer] = inputData.split(",");
  try {
    const data = await fsPromises.readFile(path);
    const dataJson = JSON.parse(data);

    //cek apakah ada admin yg sudah login
    let isAdminLogin = dataJson.filter((item) => {
      if (item.role == "admin" && item.isLogin == true) {
        return true;
      }
    });

    let indexPost = dataJson.findIndex((item) => item.name === inputTrainer);

    let objectPost = dataJson[indexPost];

    if (isAdminLogin) {
      if (!objectPost.students) {
        objectPost.students = [];
      }
      objectPost.students.push({ name: inputName });
      dataJson.splice(indexPost, 1, objectPost);
      console.log("Berhasil add siswa");

      return fsPromises.writeFile(path, JSON.stringify(dataJson));
    }
  } catch (err) {
    console.log(err);
  }
};
