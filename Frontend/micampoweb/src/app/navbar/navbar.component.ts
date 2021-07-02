import { Component, OnInit } from '@angular/core';

@Component({
    selector: 'app-navbar',
    templateUrl: './navbar.component.html',
    styleUrls: ['./navbar.component.scss']
})
export class NavbarComponent implements OnInit {

    public isCollapse = true;

    constructor() { }

    ngOnInit() {

    }

    // Navbar: Toggle event Button
    toggleState() {
        const foo = this.isCollapse;
        this.isCollapse = foo === false ? true : false;
    }

    anymethd() {

    }

}
