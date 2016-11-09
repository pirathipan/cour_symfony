<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        // homepage
        if ($pathinfo === '/layout') {
            return array (  '_controller' => 'AwesomeBundle\\Controller\\DefaultController::layoutAction',  '_route' => 'homepage',);
        }

        if (0 === strpos($pathinfo, '/page')) {
            // page1
            if ($pathinfo === '/page1') {
                return array (  '_controller' => 'AwesomeBundle\\Controller\\DefaultController::page1Action',  '_route' => 'page1',);
            }

            // page2
            if ($pathinfo === '/page2') {
                return array (  '_controller' => 'AwesomeBundle\\Controller\\DefaultController::page2Action',  '_route' => 'page2',);
            }

            // page3
            if ($pathinfo === '/page3') {
                return array (  '_controller' => 'AwesomeBundle\\Controller\\DefaultController::page3Action',  '_route' => 'page3',);
            }

        }

        if (0 === strpos($pathinfo, '/message')) {
            // message_index
            if (rtrim($pathinfo, '/') === '/message') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_message_index;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'message_index');
                }

                return array (  '_controller' => 'AwesomeBundle\\Controller\\messageController::indexAction',  '_route' => 'message_index',);
            }
            not_message_index:

            // message_new
            if ($pathinfo === '/message/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_message_new;
                }

                return array (  '_controller' => 'AwesomeBundle\\Controller\\messageController::newAction',  '_route' => 'message_new',);
            }
            not_message_new:

            // message_show
            if (preg_match('#^/message/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_message_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'message_show')), array (  '_controller' => 'AwesomeBundle\\Controller\\messageController::showAction',));
            }
            not_message_show:

            // message_edit
            if (preg_match('#^/message/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_message_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'message_edit')), array (  '_controller' => 'AwesomeBundle\\Controller\\messageController::editAction',));
            }
            not_message_edit:

            // message_delete
            if (preg_match('#^/message/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_message_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'message_delete')), array (  '_controller' => 'AwesomeBundle\\Controller\\messageController::deleteAction',));
            }
            not_message_delete:

        }

        if (0 === strpos($pathinfo, '/post')) {
            // post_index
            if (rtrim($pathinfo, '/') === '/post') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_post_index;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'post_index');
                }

                return array (  '_controller' => 'AwesomeBundle\\Controller\\postController::indexAction',  '_route' => 'post_index',);
            }
            not_post_index:

            // post_new
            if ($pathinfo === '/post/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_post_new;
                }

                return array (  '_controller' => 'AwesomeBundle\\Controller\\postController::newAction',  '_route' => 'post_new',);
            }
            not_post_new:

            // post_show
            if (preg_match('#^/post/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_post_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'post_show')), array (  '_controller' => 'AwesomeBundle\\Controller\\postController::showAction',));
            }
            not_post_show:

            // post_edit
            if (preg_match('#^/post/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_post_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'post_edit')), array (  '_controller' => 'AwesomeBundle\\Controller\\postController::editAction',));
            }
            not_post_edit:

            // post_delete
            if (preg_match('#^/post/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_post_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'post_delete')), array (  '_controller' => 'AwesomeBundle\\Controller\\postController::deleteAction',));
            }
            not_post_delete:

        }

        if (0 === strpos($pathinfo, '/ticket')) {
            // ticket_index
            if (rtrim($pathinfo, '/') === '/ticket') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_ticket_index;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'ticket_index');
                }

                return array (  '_controller' => 'AwesomeBundle\\Controller\\ticketController::indexAction',  '_route' => 'ticket_index',);
            }
            not_ticket_index:

            // ticket_new
            if ($pathinfo === '/ticket/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_ticket_new;
                }

                return array (  '_controller' => 'AwesomeBundle\\Controller\\ticketController::newAction',  '_route' => 'ticket_new',);
            }
            not_ticket_new:

            // ticket_show
            if (preg_match('#^/ticket/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_ticket_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ticket_show')), array (  '_controller' => 'AwesomeBundle\\Controller\\ticketController::showAction',));
            }
            not_ticket_show:

            // ticket_edit
            if (preg_match('#^/ticket/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_ticket_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ticket_edit')), array (  '_controller' => 'AwesomeBundle\\Controller\\ticketController::editAction',));
            }
            not_ticket_edit:

            // ticket_delete
            if (preg_match('#^/ticket/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_ticket_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ticket_delete')), array (  '_controller' => 'AwesomeBundle\\Controller\\ticketController::deleteAction',));
            }
            not_ticket_delete:

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
