{% form_theme form 'form/fields.html.twig' %}
{{ form_start(form) }}
    {{ form_widget(form) }}
{{ form_end(form) }}
<div class="box-footer">
    <button type="submit" class="btn btn-primary">Sauver</button>
</div>