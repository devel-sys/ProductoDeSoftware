import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { Usuario } from 'src/app/clases/usuario';
import { UsuarioComponent } from '../usuario/usuario.component';
import { UsuarioModule } from '../usuario/usuario.module';
import { UsuarioService } from 'src/app/servicios/usuario.service';

@Component({
  selector: 'app-sesion',
  templateUrl: './sesion.component.html',
  styleUrls: ['./sesion.component.css']
})
export class SesionComponent implements OnInit {

  constructor(
    private router: Router,
    private usuarioService : UsuarioService
    ) { }

  hide = true;

  usuario : Usuario = {
    usu_email : '',
    usu_pass : '',
  }

  sesionGroup = new FormGroup({
    inputCorreo : new FormControl('', Validators.compose([Validators.required, Validators.email])),
    inputContrasena: new FormControl('', Validators.required)
  })

  ngOnInit() {
  }

  iniciarSesion() {
    if(this.sesionGroup.valid) {   
      this.usuario.usu_email = this.sesionGroup.value.inputCorreo;
      this.usuario.usu_pass = this.sesionGroup.value.inputContrasena;
      console.log(this.usuario);
      this.usuarioService.iniciarSesion(this.usuario).subscribe(
        data => {
          console.log(data);
        }
      )
      
      // this.router.navigateByUrl('/usuario/misCampos');   
    }
  }

}
