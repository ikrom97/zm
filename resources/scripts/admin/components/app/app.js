import './App.css';
import { BrowserRouter, Navigate, Route, Routes } from 'react-router-dom';
import { AppRoute } from '../../const';
import PageWrapper from '../layouts/page-wrapper';
import QuotesIndex from '../pages/quotes';
import QuotesCreate from '../pages/quotes/create';
import QuotesEdit from '../pages/quotes/edit';

function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path={AppRoute.Index} element={<PageWrapper />}>
          <Route path={AppRoute.Admin} element={<Navigate to={AppRoute.Quotes['index']} />} />

          <Route path={AppRoute.Quotes['index']} element={<QuotesIndex />} />
          <Route path={AppRoute.Quotes['create']} element={<QuotesCreate />} />
          <Route path={AppRoute.Quotes['edit']} element={<QuotesEdit />} />

          {/* <Route path={AppRoute.News['index']} element={<NewsIndex />} />
          <Route path={AppRoute.News['create']} element={<NewsCreate />} />
          <Route path={AppRoute.News['edit']} element={<NewsEdit />} />

          <Route path={AppRoute.Articles['index']} element={<ArticlesIndex />} />
          <Route path={AppRoute.Articles['create']} element={<ArticlesCreate />} />
          <Route path={AppRoute.Articles['edit']} element={<ArticlesEdit />} /> */}
        </Route>
      </Routes>
    </BrowserRouter>
  );
}

export default App;
