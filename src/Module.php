<?php
namespace MonthlyBasis\Poem;

use MonthlyBasis\Flash\Model\Service as FlashService;
use MonthlyBasis\Poem\Model\Factory as PoemFactory;
use MonthlyBasis\Poem\Model\Service as PoemService;
use MonthlyBasis\Poem\Model\Table as PoemTable;
use MonthlyBasis\Poem\View\Helper as PoemHelper;
use MonthlyBasis\String\Model\Service as StringService;

class Module
{
    public function getConfig()
    {
        return [
            'view_helpers' => [
                'aliases' => [
                    'getRootRelativeUrl' => PoemHelper\RootRelativeUrl::class,
                ],
                'factories' => [
                    PoemHelper\RootRelativeUrl::class => function ($serviceManager) {
                        return new PoemHelper\RootRelativeUrl(
                            $serviceManager->get(PoemService\RootRelativeUrl::class)
                        );
                    },
                ],
            ],
        ];
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                PoemFactory\Poem::class => function ($serviceManager) {
                    return new PoemFactory\Poem(
                        $serviceManager->get(PoemTable\Poem::class)
                    );
                },
                PoemService\IncrementViews::class => function ($serviceManager) {
                    return new PoemService\IncrementViews(
                        $serviceManager->get(PoemTable\Poem\Views::class)
                    );
                },
                PoemService\RootRelativeUrl::class => function ($serviceManager) {
                    return new PoemService\RootRelativeUrl(
                        $serviceManager->get(StringService\UrlFriendly::class)
                    );
                },
                PoemService\Poems::class => function ($serviceManager) {
                    return new PoemService\Poems(
                        $serviceManager->get(PoemFactory\Poem::class),
                        $serviceManager->get(PoemTable\Poem::class)
                    );
                },
                PoemService\Poems\User::class => function ($serviceManager) {
                    return new PoemService\Poems\User(
                        $serviceManager->get(PoemFactory\Poem::class),
                        $serviceManager->get(PoemTable\Poem::class)
                    );
                },
                PoemService\Submit::class => function ($serviceManager) {
                    return new PoemService\Submit(
                        $serviceManager->get(FlashService\Flash::class),
                        $serviceManager->get(PoemTable\Poem::class)
                    );
                },
                PoemTable\Poem::class => function ($serviceManager) {
                    return new PoemTable\Poem(
                        $serviceManager->get('main')
                    );
                },
                PoemTable\Poem\Views::class => function ($serviceManager) {
                    return new PoemTable\Poem\Views(
                        $serviceManager->get('main')
                    );
                },
            ],
        ];
    }
}
