import { Injectable } from '@angular/core';
import { Router } from '@angular/router';
import { Observable, Subject } from 'rxjs';
import { Constante } from '../../modelo/constantes.class';
import { UsuarioInterface } from '../../modelo/usuario.interface';

@Injectable({
  providedIn: 'root'
})
export class StorageService {

  constructor(
    private router: Router
  ) { }

  private usuarioSubject: Subject<UsuarioInterface> = new Subject<UsuarioInterface>();

  // ------------------- MANEJO DE SESIÓN ----------------------- //
  // Usuario: Almacenar usuario en el localstorage
  public setUsuario(usuario: UsuarioInterface) {
    // Conversión de JSON a STRING
    const userString = JSON.stringify(usuario);
    localStorage.setItem(Constante.CURRENT_USER, userString);
    this.setUsuarioSubject(usuario);
  }

  public setUsuarioSubject(usuario) {
    this.usuarioSubject.next(usuario);
  }

  public getUsuarioSubject(): Observable<UsuarioInterface> {
    return this.usuarioSubject.asObservable();
  }

  // Usuario: Retornar usuario almacenado en el localstorage
  public getUsuario() {
    return this.getEncryptedData(Constante.CURRENT_USER);
  }

  // ENCRIPTA Y DEVUELVE LA DATA ENCRIPTADA
  encryptData(data) {
    const stringify =  JSON.stringify(data);
    const btoaCode = btoa(escape(stringify));
    return btoaCode;
  }

  // DESENCRIPTA Y DEVUELVE LA DATA DESENCRIPTADA
  decryptData(data) {
    const atobCode = atob(unescape(data));
    const dataorig = JSON.parse(unescape(atobCode));
    return dataorig;
  }

  // ALMACENA EN EL LOCALSTORAGE LA USERDATA ENCRIPTADA
  setEncryptedData(nombre, encryptedData) {
    localStorage.setItem(nombre, encryptedData);
    // this.setCookies(nombre, encryptedData);
  }

  // Retorna informacion guardada en el localstorage
  getEncryptedData(nombre): UsuarioInterface {
    const usuarioString = localStorage.getItem(nombre);
    return JSON.parse(usuarioString);
  }

  public deleteUsuario() {
    localStorage.removeItem(Constante.CURRENT_USER);
    this.setUsuarioSubject(false);
    this.router.navigate(['/sign-in']);
  }
}
