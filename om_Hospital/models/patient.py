from datetime import date
from odoo import models, fields, api


class HospitalPatient(models.Model):
    _name = "hospital.patient"
    _inherit = {'mail.thread', 'mail.activity.mixin'}
    _description = "Hospital Patient"

    name = fields.Char(string='Name', tracking=True)
    date_of_birth = fields.Date(string='Date of Birth')
    ref = fields.Char(string='Reference')
    age = fields.Integer(string='Age', compute='compute_age', tracking=True)
    gender = fields.Selection([('male', 'Male'), ('female', 'Female'), ('kids', 'Kids')], string="Gender",
                              tracking=True, default='female')
    active = fields.Boolean(string="Active", default=True)

    def _compute_age(self):
        for rec in self:
            today = date.today()
        if rec.date_of_birth:
            print("rec", rec, rec.name, rec.da)
            rec.age = today.year - rec.date_of_birth.year
        else:
            rec.age = 0
