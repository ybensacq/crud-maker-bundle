<?= $helper->getHead($base_layout_exists, 'Nouveau '.$entity_class_name); ?>

{% block body %}

    <h1>Nouveau <?= $entity_class_name; ?></h1>

    {% include '<?= $route_name; ?>/_form.html.twig' with {'form': form} only %}

{% endblock %}