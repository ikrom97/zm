import './App.css';
import { BrowserRouter, Navigate, Route, Routes } from 'react-router-dom';
import { AppRoute } from '../../const';
import PageWrapper from '../layouts/page-wrapper';
import QuotesIndex from '../pages/quotes';
import QuotesCreate from '../pages/quotes/create';
import QuotesEdit from '../pages/quotes/edit';
import TagsPage from '../pages/tags-page/tags-page';

function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path={AppRoute.Index} element={<PageWrapper />}>
          <Route path={AppRoute.Admin} element={<Navigate to={AppRoute.Quotes['index']} />} />

          <Route path={AppRoute.Quotes['index']} element={<QuotesIndex />} />
          <Route path={AppRoute.Quotes['create']} element={<QuotesCreate />} />
          <Route path={AppRoute.Quotes['edit']} element={<QuotesEdit />} />

          <Route path={AppRoute.Tags} element={<TagsPage />} />
        </Route>
      </Routes>
    </BrowserRouter>
  );
}

export default App;
