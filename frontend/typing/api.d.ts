declare namespace API {
  namespace Common {
    interface PaginatingCommonParams {
        current_page: number;
        from: number;
        last_page: string;
        links: [];
        path: string;
        per_page: number;
        to: number;
        total: number;
    }

    interface PaginatingQueryRecord<T = unknown> {
        message: string;
        data: T[];
        meta: PaginatingCommonParams;
    }

    interface QueryRecord<T = unknown> {
        message: string;
        data: T;
    }

    type CommonSearchParams = Pick<PaginatingCommonParams, 'per_page' | 'current_page'>;
  }


  namespace Auth {
    interface Token {
      token: string;
    }

    type TokenResponse = Common.QueryRecord<Token>;
  }

  namespace Contacts {
    interface Contact {
      id: number;
      name: string;
      subject: string;
      message: string;
      is_read: boolean;
      submitted_at: string;
    }

    type ContactList = Common.PaginatingQueryRecord<Contact>;
  }
}