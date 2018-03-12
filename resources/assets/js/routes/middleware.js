import CheckAccessToRoute from './Middleware/CheckAccessToRoute';

export default function middleware(router) {
  CheckAccessToRoute(router);
}
