import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Usuario } from '../clases/usuario';
import { UrlApi } from '../clases/url';

@Injectable({
  providedIn: 'root'
})
export class UsuarioService {

  constructor(private http: HttpClient) { }

  url_api = new UrlApi;


  iniciarSesion(usuario: Usuario) {

    const url = this.url_api.url_api + 'validarCode.php';

    // var myJSON = JSON.stringify(usuario);
    // let headers = new HttpHeaders().set('Content-Type','application/x-www-form-urlencoded')

    return this.http.post(url, { 'usu_email' : usuario.usu_email, 'usu_pass': usuario.usu_pass});
  }

  registrarusuario(usuario: Usuario) {
    const url = this.url_api.url_api + 'registroCode.php';

    return this.http.post(url,{'usu_usuario': usuario.usu_usuario, 'usu_nombre': usuario.usu_nombre, 'usu_email': usuario.usu_email,
    'usu_pass': usuario.usu_pass, 'usu_telefono': usuario.usu_telefono, 'usu_domicilio': usuario.usu_domicilio, 'usu_codpos': usuario.usu_codpos,
    'usu_localidad': usuario.usu_localidad, 'usu_provincia': usuario.usu_provincia
    });
  }
}
