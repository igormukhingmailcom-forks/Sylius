<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Sylius\Bundle\CoreBundle\Fixture;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

class PaymentMethodFixture extends AbstractResourceFixture
{
    use TranslatableFixtureTrait;

    /**
     * {@inheritdoc}
     */
    public function getName(): string
    {
        return 'payment_method';
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResourceNode(ArrayNodeDefinition $resourceNode): void
    {
        $this->configureTranslationsResourceNode($resourceNode);

        $resourceNode
            ->children()
                ->scalarNode('code')->cannotBeEmpty()->end()
                ->scalarNode('name')->cannotBeEmpty()->end()
                ->scalarNode('description')->cannotBeEmpty()->end()
                ->scalarNode('instructions')->end()
                ->scalarNode('gatewayName')->cannotBeEmpty()->end()
                ->scalarNode('gatewayFactory')->cannotBeEmpty()->end()
                ->arrayNode('gatewayConfig')->variablePrototype()->end()->end()
                ->arrayNode('channels')->scalarPrototype()->end()->end()
                ->booleanNode('enabled')->end()
        ;
    }
}
