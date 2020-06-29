import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-sesion',
  templateUrl: './sesion.component.html',
  styleUrls: ['./sesion.component.css']
})
export class SesionComponent implements OnInit {

  constructor(private router: Router) { }

  hide = true;

  sesionGroup = new FormGroup({
    inputCorreo : new FormControl('', Validators.compose([Validators.required, Validators.email])),
    inputContrasena: new FormControl('', Validators.required)
  })

  ngOnInit() {
  }

  iniciarSesion() {
    console.log(this.sesionGroup.valid);
    if(this.sesionGroup.valid) {   
      this.router.navigateByUrl('/usuario/misCampos');   
    }
  }

}
