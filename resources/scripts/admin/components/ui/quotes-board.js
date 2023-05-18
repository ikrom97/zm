import { DataGrid } from '@mui/x-data-grid';
import axios from 'axios';
import { useEffect, useState } from 'react';
import { dataGridLocalText } from '../../const';
import { Button, IconButton } from '@mui/material';
import { generatePath } from 'react-router-dom';
import { Stack } from '@mui/system';
import { toast } from 'react-toastify';
import { ApiRoute, AppRoute } from '../../const';
import EditIcon from '@mui/icons-material/Edit';
import DeleteIcon from '@mui/icons-material/Delete';

export default function QuotesBoard() {
  const [rows, setRows] = useState([]);
  const [selection, setSelection] = useState([]);

  useEffect(() => {
    axios.get(ApiRoute.Quotes['index'])
      .then(({ data }) => setRows(data.map(({ id, quote, slug }) => ({
        id,
        quote,
        slug: `#${slug}`,
      }))))
      .catch(({ response }) => toast.error(response.data.message));
  }, []);

  const handleDeleteClick = (id) => () => {
    window.confirm(`Вы уверены что хотите безвозвратно удалить?`) &&
      axios
        .delete(generatePath(ApiRoute.Quotes['delete'], { id }))
        .then(() => setRows([...rows.filter((row) => row.id !== id)]))
        .catch(({ response }) => toast.error(response.data.message));
  };

  const columns = [
    { field: 'id', headerName: 'ID', width: 72 },
    { field: 'quote', headerName: 'Мысль', width: 780 },
    {
      field: 'slug',
      headerName: 'Слаг',
      width: 160,
      headerAlign: 'center',
      align: 'center',
    },
    {
      field: 'actions',
      headerName: 'Действия',
      width: 120,
      headerAlign: 'center',
      align: 'center',
      renderCell: (params) => (
        <Stack spacing={1} direction="row">
          <IconButton
            sx={{
              backgroundColor: 'rgba(237, 108, 2, 0.2)',
              border: '1px solid rgba(237, 108, 2, 0.4)',
            }}
            size="small"
            href={generatePath(AppRoute.Quotes['edit'], { id: params.row.id })}
            color="warning"
            title="Редактировать"
          >
            <EditIcon />
          </IconButton>
          <IconButton
            sx={{
              backgroundColor: 'rgba(211, 47, 47, 0.2)',
              border: '1px solid rgba(211, 47, 47, 0.4)',
            }}
            size="small"
            color="error"
            title="Удалить"
            onClick={handleDeleteClick(params.row.id)}
          >
            <DeleteIcon />
          </IconButton>
        </Stack>
      ),
    },
  ];

  const handleDeleteSelectedButtonClick = () => {
    window.confirm(
      `Вы уверены что хотите безвозвратно удалить выбранные?
      \nВыбрано ${selection.length}`
    ) &&
      axios
        .post(ApiRoute.Quotes['multidelete'], { ids: selection })
        .then(() => setRows([...rows.filter((row) => !selection.includes(row.id))]))
        .catch(({ response }) => toast.error(response.data.message));
  };

  return (
    <>
      <Stack direction="row" justifyContent="right" marginBottom={1} spacing={1}>
        <Button
          variant="contained"
          color="error"
          disabled={!selection.length}
          onClick={handleDeleteSelectedButtonClick}
        >
          Удалить выбранные ({selection.length})
        </Button>
        <Button
          variant="contained"
          color="success"
          href={AppRoute.Quotes['create']}
        >
          Добавить новый
        </Button>
      </Stack>

      <DataGrid
        sx={{ backgroundColor: 'white', height: 631 }}
        rows={rows}
        columns={columns}
        pageSize={10}
        rowsPerPageOptions={[10]}
        checkboxSelection
        disableSelectionOnClick
        onSelectionModelChange={(newSelectionModel) => setSelection(newSelectionModel)}
        localeText={dataGridLocalText}
      />
    </>
  );
}
