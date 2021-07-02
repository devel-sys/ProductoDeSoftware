import { Injectable } from '@angular/core';
import { UsuarioInterface } from '../../core/modelo/usuario.interface';

@Injectable({
  providedIn: 'root'
})
export class StorageService {

  constructor() { }

  // ALMACENAMIENTO DEL USUARIO EN EL LOCALSTORAGE
  setUsuario(user: UsuarioInterface) {
    let user_string = JSON.stringify(user);
    localStorage.setItem('currentUser', user_string);
  }

  // ENCRIPTA Y DEVUELVE LA DATA ENCRIPTADA
  encryptData(data) {
    const stringify =  JSON.stringify(data)
    const btoa_code = btoa(escape(stringify));
    return btoa_code;
  }

  // DESENCRIPTA Y DEVUELVE LA DATA DESENCRIPTADA
  decryptData(data) {
    const atob_decode = atob(unescape(data));
    const dataorig = JSON.parse(unescape(atob_decode));
    return dataorig;
  }

  // ALMACENA EN EL LOCALSTORAGE LA USERDATA ENCRIPTADA
  setEncryptedData(nombre, encryptedData) {
    localStorage.setItem(nombre, encryptedData);
    // this.setCookies(nombre, encryptedData);
  }

  // OBTIENE DEL LOCALSTORAGE LA USERDATA ALMACENADA
  getEncryptedData(nombre) {
    return localStorage.getItem(nombre);
  }
}
