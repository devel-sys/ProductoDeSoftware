import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AdminSesionComponent } from './admin-sesion.component';

describe('AdminSesionComponent', () => {
  let component: AdminSesionComponent;
  let fixture: ComponentFixture<AdminSesionComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AdminSesionComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AdminSesionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
